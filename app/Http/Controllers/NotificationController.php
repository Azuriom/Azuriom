<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Mark the specified notification as read.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Azuriom\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function markAsRead(Request $request, Notification $notification)
    {
        abort_if($request->user()->id !== $notification->user_id, 403);

        $notification->markAsRead();

        return $request->expectsJson() ? response()->noContent() : redirect()->back();
    }

    /**
     * Mark all the user notification as read.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function markAllAsRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();

        return $request->expectsJson() ? response()->noContent() : redirect()->back();
    }
}
