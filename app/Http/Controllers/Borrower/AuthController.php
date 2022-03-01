<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\Borrower;
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
        return Auth::guard('borrower');
    }

    public function redirectTo()
    {
        return route('borrower.company');
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('borrower.login'));
    }

    public function register()
    {
        return view('auth.borrower.register');
    }

    public function processRegistration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:borrowers,email',
            'mobile_number' => 'required|unique:borrowers,mobile_number',
            'appointed_director' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
            'terms_consent' => 'required',
        ], [
            'terms_consent.required' => 'You must agree to the terms and conditions',
            'appointed_director.required' => 'Please select your role in the company'
        ]);
        $borrower = new Borrower();
        $borrower->first_name = $request->first_name;
        $borrower->last_name = $request->last_name;
        $borrower->email = $request->email;
        $borrower->mobile_number = $request->mobile_number;
        $borrower->appointed_director = $request->appointed_director;
        $borrower->password = Hash::make($request->password);
        $borrower->terms_consent = $request->terms_consent;
        $borrower_id = $borrower->save();
//         \auth('borrower')->loginUsingId($borrower_id);
        return redirect(route('borrower.login') . '?success');
    }
}

