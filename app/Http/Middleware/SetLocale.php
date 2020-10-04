<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public static $parameterName = 'lang';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->has(SetLocale::$parameterName)) {
            $lang = $request->get(SetLocale::$parameterName);
            if (in_array($lang, config('app.available_locales'))) {
                session()->put(SetLocale::$parameterName, $lang);
            } else {
                session()->put(SetLocale::$parameterName, config('app.locale'));
            }
            // remove ?lang=xx parameter from route
            $params = $request->all();
            unset($params[SetLocale::$parameterName]);
            $append = http_build_query($params) ? '?'.http_build_query($params) : '';
            return redirect()->to($request->url() . $append);
        }
        app()->setLocale(session()->get(SetLocale::$parameterName));
        return $next($request);
    }

    public static function set_locale_url($locale) {
        return request()->fullUrlWithQuery([SetLocale::$parameterName => $locale]);
    }
}
