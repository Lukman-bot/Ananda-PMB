<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('id_users')) {
            return redirect('/')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return $next($request);
    }
}
