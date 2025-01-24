<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StaffMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\DosenMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'superadmin' => SuperAdminMiddleware::class,
            'admin' => AdminMiddleware::class,
            'staff' => StaffMiddleware::class,
            'dosen' => DosenMiddleware::class,
        ]);

        $middleware->append(SuperAdminMiddleware::class);
        $middleware->append(AdminMiddleware::class);
        $middleware->append(StaffMiddleware::class);
        $middleware->append(DosenMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
