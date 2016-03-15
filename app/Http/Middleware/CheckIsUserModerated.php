<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsUserModerated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if($user->is_moderated || $user->roles()->first()->role_slug == "student"){
            return $next($request);
        }

        return dd("Ваш аккаунт не активований! Зачекайте поки адміністратор вашої школи активує ваш аккаунт.");
    }
}
