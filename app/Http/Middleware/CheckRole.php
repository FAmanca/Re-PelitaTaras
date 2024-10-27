<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $status = 'admin')
    {
        if (!Auth::check() || Auth::user()->status !== $status) {
            return redirect('/home'); // Redirect jika bukan admin
        }

        return $next($request); // Lanjutkan jika role sesuai
    }
}
