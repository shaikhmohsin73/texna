<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('employee');
        }
        return view('welcome');
    }

    public function logins(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $admin = Auth::guard('admin')->user();
            $name  = $admin->name;
            $email = $admin->email;
            $ip    = $request->ip();
            $time  = now()->format('d-m-Y H:i:s');
            sendTelegramMessage(
                "🔐 <b>Admin Login Alert</b>\n\n" .
                    "👤 Name: <b>$name</b>\n" .
                    "📧 Email: <b>$email</b>\n" .
                    "🌐 IP: <b>$ip</b>\n" .
                    "⏰ Time: <b>$time</b>"
            );
            return redirect()->route('employee');
        }
        sendTelegramMessage(
            "❌ <b>Failed Login Attempt</b>\n\n" .
                "📧 Email: {$request->email}\n" .
                "🌐 IP: {$request->ip()}\n" .
                "⏰ Time: " . now()->format('d-m-Y H:i:s')
        );
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


   
}
