<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AdminAuthenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = ['admin'];
        return parent::handle($request, $next, ...$guards);
    }

    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }

        return null;
    }
}


