<?php

namespace App\Http;

use App\Http\Middleware\CheckRole;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class kernel extends HttpKernel
{
    // Middleware yang diterapkan ke semua request
    protected $middleware = [
        // Daftar middleware global
    ];

    // Middleware grup
    protected $middlewareGroups = [
        'web' => [
            // Daftar middleware untuk grup 'web'
        ],
        'api' => [
            // Daftar middleware untuk grup 'api'
        ],
    ];

    // Di sinilah `$routeMiddleware` harus berada
    protected $routeMiddleware = [
        // 'auth' => \App\Http\Middleware\Authenticate::class,
        'checkrole' => CheckRole::class, // Tambahkan middleware di sini
        // Middleware lainnya
    ];
}
