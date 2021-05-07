<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate extends Middleware
{
    protected $guards;

    public function handle($request, \Closure $next, ...$guards)
    {
        $this->guards = $guards;
        $this->authenticate($request, $guards);

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $redirectRoute = 'login';
            if ($this->guards) {
                switch ($this->guards[0]) {
                    case 'web':
                        $redirectRoute = 'dang-nhap';
                        break;
                }
            }
            return route($redirectRoute);
        }
    }
}
