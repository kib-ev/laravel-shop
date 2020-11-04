<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public static $parameterName = 'lang';

    public static function set_locale_url($locale)
    {
        return request()->fullUrlWithQuery([SetLocale::$parameterName => $locale]);
    }

    public function handle(Request $request, Closure $next)
    {
        if (!session()->has(SetLocale::$parameterName)) {
            session()->put(SetLocale::$parameterName, config('app.locale'));
        }

        if ($request->has(SetLocale::$parameterName)) {
            $lang = $request->get(SetLocale::$parameterName);
            if (in_array($lang, config('app.available_locales'))) {
                session()->put(SetLocale::$parameterName, $lang);
            }
        }

        app()->setLocale(session()->get(SetLocale::$parameterName));

        return $this->removeLocaleParamFromUrlAndRedirect($request, $next);
    }

    protected function removeLocaleParamFromUrlAndRedirect(Request $request, Closure $next)
    {
        if ($request->method() == 'GET' && $request->has(SetLocale::$parameterName)) {
            // remove ?lang=xx parameter from url
            $params = $request->all();
            unset($params[SetLocale::$parameterName]);
            $append = http_build_query($params) ? '?' . http_build_query($params) : '';
            return redirect()->to($request->url() . $append);
        } else {
            return $next($request);
        }
    }
}
