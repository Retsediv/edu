<?php

namespace App\Http\Middleware;

use Closure;

class ChekRoleAndRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();
        $role = $user->roles()->first()->role_slug;

        if (in_array($role,  $roles)) {
            return $next($request);
        }

        return 'You have not a permission to see this page';
    }
}
