<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $adminEmail = 'admin@example.com';
    private $adminPassword = 'admin123';

    public function showLoginForm()
    {
        if (Cookie::get('admin_auth')) {
            return redirect()->route('admin.projects.index');
        }
        return view('portfolio.admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($request->email === $this->adminEmail && $request->password === $this->adminPassword) {
            $payload = json_encode([
                'email' => $this->adminEmail,
                'name' => 'Admin',
                'time' => now()->timestamp,
            ]);

            $response = redirect()->intended(route('admin.projects.index'));
            $response->cookie('admin_auth', $payload, 120 * 60);

            return $response;
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        $response = redirect()->route('admin.login');
        $response->cookie(Cookie::forget('admin_auth'));

        return $response;
    }
}
