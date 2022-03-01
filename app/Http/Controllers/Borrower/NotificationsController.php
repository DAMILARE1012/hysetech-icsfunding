<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\Business;

class NotificationsController extends Controller
{
    public function index()
    {

        $business = Business::whereId(auth('borrower')->user()->business_id)->first();
        if($business){

            $notifications = $business->notifications()->get();
        }
        else{
            $notifications = collect([]);
        }
        return view('borrower.sections.notifications.index', [
            'title' => 'Notifications',
            'nav_active' => 'notifications',
            'sub_nav_active' => 'notifications',
            'notifications' => $notifications
        ]);
    }


}
