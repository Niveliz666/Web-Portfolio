<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $adminAuth = Cookie::get('admin_auth');

        if (!$adminAuth) {
            return redirect()->route('admin.login');
        }

        $payload = json_decode($adminAuth, true);

        if (!$payload || !isset($payload['email']) || $payload['email'] !== 'admin@example.com') {
            return redirect()->route('admin.login')->withoutCookie('admin_auth');
        }

        return $next($request);
    }
}
