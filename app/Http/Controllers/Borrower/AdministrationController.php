<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;

class AdministrationController extends Controller
{
    public function index()
    {
        $borrower = auth('borrower')->user();
        $business = $borrower->business()->first();
        return view('borrower.sections.administration.users', [
            'title' => 'Administration',
            'nav_active' => 'administration',
            'sub_nav_active' => 'users',
            'business' => $business
        ]);
    }

    public function permissions()
    {
        return view('borrower.sections.administration.permissions', [
            'title' => 'Administration',
            'nav_active' => 'administration',
            'sub_nav_active' => 'permissions'
        ]);
    }

}
