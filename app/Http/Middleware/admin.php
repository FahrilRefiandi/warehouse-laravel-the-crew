<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
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
        // cek apakah user sudah login
        if(Auth::user()){
            // cek apakah user adalah BUKAN admin
            if(Auth::user()->level != 2 ){
                // jika bukan,maka redirect ke halaman DASHBOARD
                return redirect('/dashboard')->with('status',"Halaman bukan untuk anda.!");
            }
        }else{
            // jika belum LOGIN ,maka redirect ke halaman UTAMA
            return redirect('/');
        }

        return $next($request);
    }
}
