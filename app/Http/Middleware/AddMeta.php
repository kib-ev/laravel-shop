<?php

namespace App\Http\Middleware;

use App\Models\Meta;
use Closure;
use Illuminate\Http\Request;

class AddMeta
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
        $meta = Meta::firstOrCreate([
            'uri' => $request->path() != '/' ? '/'. $request->path() : '/' ,
            'lang' => app()->getLocale(),
        ]);

//        $meta->title = ' | ' .config('app.name');

        view()->share('meta', $meta);

        return $next($request);
    }
}
