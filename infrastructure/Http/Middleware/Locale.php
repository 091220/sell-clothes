<?php 

namespace Infrastructure\Http\Middleware;

use Closure;

class Locale
{
    public function handle($request, Closure $next)
    {
        $timezone = (@request()->header()['timezone'][0]) ? @request()->header()['timezone'][0] : config('app.timezone');
        date_default_timezone_set($timezone);
        $lang = @$request->header()['lang'][0];
        if(!$lang){
            \App::setLocale('vi');
        }else{
            \App::setLocale(@$request->header()['lang'][0]);
        }
        return $next($request);
    }
}
