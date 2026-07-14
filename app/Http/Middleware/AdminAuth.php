<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    private string $cookieName = 'admin_token';
    private string $secret = 'portfolio-admin-k3y-2026!';

    public function handle(Request $request, Closure $next): Response
    {
        if (!isset($_COOKIE[$this->cookieName]) || empty($_COOKIE[$this->cookieName])) {
            return redirect()->route('admin.login');
        }

        $token = $_COOKIE[$this->cookieName];

        if (strlen($token) !== 64) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
