<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RedirectWww
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
        $mask = 'www.';
        $host = $request->header('host');

        if (substr($host, 0, 4) === $mask && App::environment() === 'production') {
            $request->headers->set('host', substr($host, 4));
            return Redirect::to($request->path());
        }

        return $next($request);
    }
}
