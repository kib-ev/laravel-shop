<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsIpAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $allowedIps = ['178.172.133.161', '86.57.209.252'];
    protected $redirectTo = 'https://agrofilter.by';

    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->ip(), $this->allowedIps)) {
            return $next($request);
        } else {
            return redirect()->to($this->redirectTo);
        }
    }
}
