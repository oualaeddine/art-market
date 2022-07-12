<?php

namespace App\Http\Middleware;


use App\Helpers\SetLocal;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChangeLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = Session::get('client_lang');

        if($lang){
            SetLocal::generate('ar');
            \app()->setLocale('ar');
            Session::put(['locale'=>'ar']);
        }else{
            $request->session()->forget('client_lang');
            app()->setLocale('fr');
            session()->put(['locale', 'fr']);
        }

        return $next($request);
    }
}
