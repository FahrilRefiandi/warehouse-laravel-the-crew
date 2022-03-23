<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class pegawai
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
            // cek apakah user adalah PEGAWAI
            if(Auth::user()->level >= 1){
                // JIKA PEGAWAI,MAKA LANJUTKAN
                return $next($request);
            }else{
                // JIKA TIDAK,MAKA REDIRECT KE HALAMAN DASHBOARD
                return redirect('/dashboard')->with('status',"Halaman bukan untuk anda.!");
            }
        }else{
            // JIKA BELUM LOGIN,MAKA REDIRECT KE HALAMAN UTAMA
            return redirect('/');
        }


    }
}
