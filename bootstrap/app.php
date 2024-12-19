<?php

use App\Http\Middleware\authh;
use App\Http\Middleware\register;
use App\Http\Middleware\verification;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([

            'verification' => verification::class,

        ]);

        $middleware->trustProxies(
            headers: Request::HEADER_X_FORWARDED_FOR |
                Request::HEADER_X_FORWARDED_HOST |
                Request::HEADER_X_FORWARDED_PORT |
                Request::HEADER_X_FORWARDED_PROTO |
                Request::HEADER_X_FORWARDED_AWS_ELB |
                // X-Forwarded-Proto
                Request::HEADER_FORWARDED,
            at: '127.0.0.1,REMOTE_ADDR'
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
