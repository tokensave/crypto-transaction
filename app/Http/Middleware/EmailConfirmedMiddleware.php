<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailConfirmedMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user->isEmailConfirm())
            return $next($request);

        return redirect()->guest('/email/confirmation');
    }
}
