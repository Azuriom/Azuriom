<?php

namespace Azuriom\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{

    public function read_all()
    {
        $user = Auth::user();
        $user->unreadNotifications()->update(['read_at' => now()]);
        return Redirect::back();
    }

    public function read_one(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return $notification->data['href'] === '#' ? Redirect::back() : redirect($notification->data['href']);
    }
}
