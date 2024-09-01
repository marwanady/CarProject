<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
Use App\Http\Middleware\CheckUserType;
Use App\Http\Middleware\UnreadMessages;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['CheckAdmin' =>CheckUserType::class,
       'unreadmessages'=> UnreadMessages::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
