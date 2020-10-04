<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
                session()->put('lang', $lang);
            } else {
                session()->put('lang', config('app.locale'));
            }
            return redirect()->to($request->url());
        }
        app()->setLocale(session()->get('lang'));
        return $next($request);
    }
}
