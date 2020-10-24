<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Genres;

class BookController extends Controller
{
    public function insertForm(){
        $genreArr = Genres::get();

        return \view('book.insert', ["genreArr" => $genreArr]);
    }

    public function insertBook(Request $req){
        $newBook = new Books();
        $newBook->nama = $req['nama'];
        $newBook->genre_id = $req['genre'];
        $newBook->blurb = $req['blurb'];
        $newBook->stok = $req['stok'];
        $newBook->penulis = $req['penulis'];
        $newBook->rating = $req['rating'];
        $newBook->bahasa_id = $req['bahasa'];
        $newBook->harga_beli = $req['harga_beli'];
        $newBook->harga_jual = $req['harga_jual'];
        $newBook->diskon = $req['diskon'];
        $newBook->status = 1;
        $BookInsert = $newBook->save();

        $ext = $req->file("gambar")->getClientOriginalExtension();
        $nama = $newBook->id.".".$ext;
        $req->file("gambar")->storeAs("images", $nama, "public");

        if($BookInsert){
            $newBook->gambar_nama = $nama;
            $newBook->save();

            return redirect()
                ->back()
                ->with("success", "Succsess insert new Book!");
        } else {
            return redirect()
                ->back()
                ->with("error", "Failed add new Book!");
        }
    }

    public function showBook(){
        $BookArr = Books::all();

        return \view('Book.list', ['BookArr' => $BookArr]);
    }

    public function editForm($id){
        $genreArr = Genres::get();

        $Book = Books::where('id', $id)
                    ->first();

        return \view('Book.edit', ['Book' => $Book,
                                    'genreArr' => $genreArr]);
    }

    public function edit(Request $req, $id){
        $BookUpdate = Books::findorFail($id);
        $BookUpdate->nama = $req['nama'];
        $BookUpdate->genre_id = $req['genre'];
        $BookUpdate->blurb = $req['blurb'];
        $BookUpdate->stok = $req['stok'];
        $BookUpdate->penulis = $req['penulis'];
        $BookUpdate->rating = $req['rating'];
        $BookUpdate->bahasa_id = $req['bahasa'];
        $BookUpdate->harga_beli = $req['harga_beli'];
        $BookUpdate->harga_jual = $req['harga_jual'];
        $BookUpdate->diskon = $req['diskon'];
        $BookUpdate->status = 1;
        $BookInsert = $BookUpdate->save();

        if ($req->file("gambar") != null) {
            $name = $BookUpdate->id.".".$req->file("gambar")->getClientOriginalExtension();
            $req->file("gambar")->storeAs("images", $name, "public");
            $BookUpdate->gambar = $name;
            $BookUpdate->save();
        }

        if($BookUpdate){
            return redirect()
                ->route('BookList')
                ->with("success", "Succsess update Book!");
        } else {
            return redirect()
                ->route('BookList')
                ->with("error", "Failed update Book!");
        }
    }

    public function active(Request $req, $id){
        $BookUpdate = Books::where('id', $id)
                ->update(['status' => 1 ]);

        if($BookUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function nonActive(Request $req, $id){
        $BookUpdate = Books::where('id', $id)
                ->update(['status' => 0 ]);

        if($BookUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }
}
