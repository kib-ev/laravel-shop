<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->has('lang')) {
            $lang = $request->get('lang');
            if (in_array($lang, config('app.available_locales'))) {
                Session::put('lang', $lang);
            } else {
                Session::put('lang', config('app.locale'));
            }
        }
        App::setLocale(Session::get('lang'));
        return $next($request);
    }
}
