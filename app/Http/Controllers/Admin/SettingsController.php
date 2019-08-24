<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
use Azuriom\Support\LangHelper;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    /**
     * The supported hash algorithms
     *
     * @var array
     */
    private $hashAlgorithms = [
        'bcrypt' => 'Bcrypt',
        'argon' => 'Argon2i',
        'argon2id' => 'Argon2id (PHP 7.3.0+)'
    ];

    public function index()
    {
        return view('admin.settings.index')
            ->with('languages', LangHelper::getAvailableLanguages())
            ->with('timezones', array_values(DateTimeZone::listIdentifiers(DateTimeZone::ALL)))
            ->with('currentTimezone', config('app.timezone'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'timezone' => ['required', 'timezone'],
            'locale' => ['required', 'string', Rule::in(array_keys(LangHelper::getAvailableLanguages()))]
        ]);

        $settings = $request->only(['name', 'description', 'url', 'timezone', 'locale']);

        $this->updateSettings($settings);

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated');
    }

    public function security()
    {
        $show = (setting('recaptcha-site-key') && setting('recaptcha-site-key')) || old('enable-recaptcha');

        return view('admin.settings.security')
            ->with('hashAlgorithms', $this->hashAlgorithms)
            ->with('currentHash', config('hashing.driver'))
            ->with('showReCaptcha', $show);
    }

    public function updateSecurity(Request $request)
    {
        $enableReCaptcha = $request->has('enable-recaptcha');

        $this->validate($request, [
            'hash' => ['required', 'string', Rule::in(array_keys($this->hashAlgorithms))],
            'recaptcha-site-key' => $enableReCaptcha ? ['required', 'string', 'max:50'] : ['nullable'],
            'recaptcha-secret-key' => $enableReCaptcha ? ['required', 'string', 'max:50'] : ['nullable']
        ]);

        if ($enableReCaptcha) {
            $this->updateSettings($request->only(['recaptcha-site-key', 'recaptcha-secret-key']));

        } else {
            Setting::whereIn('name', ['recaptcha-site-key', 'recaptcha-secret-key'])->delete();
        }

        $this->updateSettings($request->all(['hash']));

        return redirect()->route('admin.settings.security')->with('success', 'Settings updated');
    }

    private function updateSettings(array $settings)
    {
        foreach ($settings as $name => $value) {
            Setting::updateOrCreate(['name' => $name], ['value' => $value]);
        }
    }
}
