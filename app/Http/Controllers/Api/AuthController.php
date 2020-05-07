<?php

namespace Azuriom\Http\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Resources\AuthenticatedUser as AuthenticatedUserResource;
use Azuriom\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (! setting('auth-api', false)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Auth API is not enabled',
                ], 422);
            }

            return $next($request);
        });
    }

    /**
     * Authenticate the user and get the access token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Support\Responsable
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (! Auth::validate($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials',
            ], 422);
        }

        $user = Auth::getLastAttempted();

        if ($user->is_banned) {
            return response()->json(['status' => false, 'message' => 'User banned'], 422);
        }

        if ($user->game_id === null) {
            $user->game_id = Str::uuid();
        }

        $user->update(['access_token' => Str::random(128)]);

        return new AuthenticatedUserResource($user);
    }

    /**
     * Get the profile of the user by his access token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Support\Responsable
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function verify(Request $request)
    {
        $this->validate($request, ['access_token' => 'required|string']);

        $user = User::firstWhere('access_token', $request->input('access_token'));

        if ($user === null) {
            return response()->json(['status' => false, 'message' => 'Invalid token'], 422);
        }

        if ($user->is_banned) {
            return response()->json(['status' => false, 'message' => 'User banned'], 422);
        }

        return new AuthenticatedUserResource($user);
    }

    /**
     * Invalidate the access token if it exists.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $this->validate($request, ['access_token' => 'required|string']);

        User::where('access_token', $request->input('access_token'))->update(['access_token' => null]);

        return response()->json(['status' => true]);
    }
}
