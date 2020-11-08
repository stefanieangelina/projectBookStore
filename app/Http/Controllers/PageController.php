<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function viewDetail($id){
        $detailBuku = Book::where('id', $id)
                        ->first();

        return \view('detailDisplay', ['detailBuku' => $detailBuku]);
    }
}
