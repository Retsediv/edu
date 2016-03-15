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
        if($request->user()->is_moderated){
            return $next($request);
        }

        return dd("Ваш аккаунт не активований! Зачекайте поки адміністратор вашої школи активує ваш аккаунт.");
    }
}
