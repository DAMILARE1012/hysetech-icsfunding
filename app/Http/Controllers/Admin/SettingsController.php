<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.sections.settings.general', [
            'title' => 'Settings',
            'nav_active' => 'settings',
            'sub_nav_active' => 'general'
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = auth('user')->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('admin.settings')->with('error', 'Current Password is invalid');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.settings')->with('success', 'Password updated');
    }
}
