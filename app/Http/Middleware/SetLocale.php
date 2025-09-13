<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Check if lang is in the request, otherwise use session, otherwise default to 'en'
        if (session()->has('lang')) {
            $lang = session()->get('lang');

        }else{
            $lang = 'eng';
            session()->put('lang',$lang);
        }

        app()->setLocale($lang);

        return $next($request);
    }
}
