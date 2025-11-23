<?php

namespace App\Http\Middleware;

use App;
use Closure;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = session('locale') ?: substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        app()->setLocale($lang);
        config(['app.locale' => $lang]);

        return $next($request);
    }
}
