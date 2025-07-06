<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // 認証時、非認証時のリダイレクト先を指定
        // 無名関数ではなく、パスでもOK（例：redirectGuestsTo('/admin/login')）
        $middleware
            ->redirectGuestsTo(fn() => route('admin.login'))
            ->redirectUsersTo(fn() => route('admin.blogs.index'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
