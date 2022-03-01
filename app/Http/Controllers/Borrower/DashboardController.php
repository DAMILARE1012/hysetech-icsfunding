<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('borrower.sections.index', [
            'title' => 'Dashboard',
            'menu_nav' => 'dashboard'
        ]);
    }


}
