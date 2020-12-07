<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function ViewDetail($id){
        $detailBuku = Book::where('id', $id)
                        ->first();

        return \view('detailDisplay', ['detailBuku' => $detailBuku]);
    }

    public function search(Request $req){

        $keyword = '%'.strtolower($req->keyword).'%';

        $arrBuku = Book::get();

        if($keyword == ""){
            $arrBuku = Book::get();
        } else {
            // SELECT * FROM books
            // where lower(name) like '%t%';

            $arrBuku = Book::where('name', 'like', '%'. $keyword. '%')
                    ->get();
        }

        return view('home', ['arrBuku'=> $arrBuku]);
    }
}
