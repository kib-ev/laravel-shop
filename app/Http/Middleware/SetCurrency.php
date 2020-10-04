<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetCurrency
{
    public static $parameterName = 'currency';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->has(SetCurrency::$parameterName)) {
            $currency = $request->get(SetCurrency::$parameterName);
            if (in_array($currency, ['usd', 'rub', 'byn'])) {
                session()->put(SetCurrency::$parameterName, $currency);
            } else {
                session()->put(SetCurrency::$parameterName, 'byn');
            }
            // remove ?currency=xxx parameter from route
            $params = $request->all();
            unset($params[SetCurrency::$parameterName]);
            $append = http_build_query($params) ? '?'.http_build_query($params) : '';
            return redirect()->to($request->url() . $append);
        }
        return $next($request);
    }

    public static function set_currency_url($currency) {
        return request()->fullUrlWithQuery([SetCurrency::$parameterName => $currency]);
    }
}
