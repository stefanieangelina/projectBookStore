<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user  = Auth::user()->name;
        // echo ($user);
        $arrBuku = Book::get();
        // dd($arrBuku);
        return view('home', ['arrBuku'=> $arrBuku]);
    }

    public function profil(){
        return \view('profil');
    }
}
