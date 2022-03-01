<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class PasswordResetsController extends Controller
{
    use ResetsPasswords;

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');
        return view('auth.consultant.password-reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('consultants');
    }

    public function redirectTo()
    {
        return route('consultant.company');

    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('consultant');
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])/|confirmed',
        ];
    }

    protected function validationErrorMessages()
    {
        return [
            'password.regex' => 'Password must be at least 8 characters long and contain a capital letter and a number'
        ];
    }
}
