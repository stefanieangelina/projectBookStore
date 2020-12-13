<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Users;
use Closure;

class cekAlamat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId  = Auth::user()->id;
        $data = Users::where('id', $userId)->get();
        foreach ($data as $key) {
            if($key->adress == "")
            {

                dd("kosong");
            }
        }
        return $next($request);
    }
}
