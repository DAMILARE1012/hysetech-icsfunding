<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Consultant;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('consultant');
    }

    public function redirectTo()
    {
        return route('consultant.profile');
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('consultant.login'));
    }

    public function register()
    {
        return view('auth.consultant.register');
    }

    public function processRegistration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:consultants,email',
            'mobile_number' => 'required|unique:consultants,mobile_number',
            'company' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
            'terms_consent' => 'required',
        ], [
            'terms_consent.required' => 'You must agree to the terms and conditions',
            'appointed_director.required' => 'Please select your role in the company'
        ]);
        $consultant = new Consultant();
        $consultant->first_name = $request->first_name;
        $consultant->last_name = $request->last_name;
        $consultant->email = $request->email;
        $consultant->mobile_number = $request->mobile_number;
        $consultant->employer = $request->company;
        $consultant->password = Hash::make($request->password);
        $consultant->terms_consent = $request->terms_consent;
        $consultant->status = 'Pending';
        $consultant_id = $consultant->save();
        return redirect(route('consultant.login') . '?success');
    }
}
