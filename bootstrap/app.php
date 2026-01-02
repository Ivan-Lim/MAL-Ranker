<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Suppress PHP 8.5+ deprecation warnings for PDO constants in vendor files
if (PHP_VERSION_ID >= 80500) {
    set_error_handler(function ($errno, $errstr, $errfile, $errline) {
        // Suppress only PDO::MYSQL_ATTR_SSL_CA deprecation warnings from vendor files
        if ($errno === E_DEPRECATED &&
            str_contains($errstr, 'PDO::MYSQL_ATTR_SSL_CA') &&
            str_contains($errfile, 'vendor/laravel/framework')) {
            return true; // Suppress this warning
        }
        // Let other errors through
        return false;
    }, E_DEPRECATED);
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
