<?php

namespace Infrastructure\Auth\Middleware;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Route;
use Infrastructure\Libraries\HelperFunction;
use Closure;

class CheckLogin
{

    public function __construct(
        Route $route,
        Application $app,
        Authenticate $authenticate,
        HelperFunction $helperFunction
    ) {
        $this->app            = $app;
        $this->route          = $route;
        $this->authenticate   = $authenticate;
        $this->helperFunction = $helperFunction;
    }

    public function handle($request, Closure $next)
    {
        if(\Auth::check()){
            return redirect('/admin/dashboard');
        }
        return $next($request);
    }

}
