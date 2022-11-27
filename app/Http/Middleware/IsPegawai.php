<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPegawai
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
        if (auth()->user()->jabatan == 'pegawai') {
            return $next($request);
        }

        return redirect('home')->with('error', "You Don't have permission as pegawai");
    }
}
