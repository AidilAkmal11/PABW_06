<?php
// Laravel 11/12: ganti isi bootstrap/app.php dengan ini
// (atau cukup tambahkan dua baris di dalam withMiddleware).

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Tamu yang membuka halaman ber-middleware auth diarahkan ke /login
        $middleware->redirectGuestsTo(fn () => route('login'));
        // Petugas yang sudah login dan membuka /login atau /register diarahkan ke daftar laporan
        $middleware->redirectUsersTo(fn () => route('laporan.index'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
