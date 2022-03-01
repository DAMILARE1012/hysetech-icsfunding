<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = auth('consultant')->user()->notifications()->get();
        return view('consultant.sections.notifications.index', [
            'title' => 'Notifications',
            'nav_active' => 'notifications',
            'sub_nav_active' => 'notifications',
            'notifications' => $notifications
        ]);
    }


}
