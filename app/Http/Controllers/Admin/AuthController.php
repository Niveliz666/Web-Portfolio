<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private string $adminEmail = 'admin@example.com';
    private string $adminPassword = 'admin123';
    private string $cookieName = 'admin_token';
    private string $secret = 'portfolio-admin-k3y-2026!';

    public function showLoginForm()
    {
        if ($this->isLoggedIn()) {
            return redirect()->route('admin.projects.index');
        }
        return view('portfolio.admin.auth.login');
    }

    public function login(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return view('portfolio.admin.auth.login')->withErrors($validator)->withInput($request->only('email'));
        }

        if ($request->email === $this->adminEmail && $request->password === $this->adminPassword) {
            $token = hash_hmac('sha256', $request->email . time(), $this->secret);

            setcookie($this->cookieName, $token, [
                'expires'  => time() + (120 * 60),
                'path'     => '/',
                'secure'   => true,
                'httponly'  => true,
                'samesite' => 'Lax',
            ]);

            return redirect()->route('admin.projects.index');
        }

        return view('portfolio.admin.auth.login')->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    public function logout()
    {
        setcookie($this->cookieName, '', [
            'expires'  => time() - 3600,
            'path'     => '/',
            'secure'   => true,
            'httponly'  => true,
            'samesite' => 'Lax',
        ]);

        return redirect()->route('admin.login');
    }

    private function isLoggedIn(): bool
    {
        return isset($_COOKIE[$this->cookieName]) && !empty($_COOKIE[$this->cookieName]);
    }
}
