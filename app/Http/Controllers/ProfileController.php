<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'password' => 'required|min:6|confirmed',
            ],
            [
                'old_password.required' => 'Please enter your current password.',
                'password.required' => 'Please enter a new password.',
                'password.min' => 'New password must be at least 6 characters.',
                'password.confirmed' => 'New password and confirm password do not match.',
            ]
        );
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors([
                'old_password' => 'The current password you entered is incorrect.'
            ]);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Your password has been updated successfully.');
    }
}
