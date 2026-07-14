<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Hardcoded admin credentials
    private $adminEmail = 'admin@example.com';
    private $adminPassword = 'admin123';

    public function showLoginForm()
    {
        if (session()->get('admin_logged_in')) {
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

        // Check credentials (no database needed)
        if ($request->email === $this->adminEmail && $request->password === $this->adminPassword) {
            $request->session()->put('admin_logged_in', true);
            $request->session()->put('admin_user', [
                'name' => 'Admin',
                'email' => $this->adminEmail
            ]);
            return redirect()->intended(route('admin.projects.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');
        $request->session()->forget('admin_user');
        return redirect()->route('admin.login');
    }
}