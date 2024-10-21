<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        $valid = false;
        foreach ($roles as $role) {
            if (auth()->user()->role === User::ROLES[$role]) {
                $valid = true;
                break;
            }
        }
        if ($valid) {
            return $next($request);
        } else {
            abort(403);
        }

    }
}
