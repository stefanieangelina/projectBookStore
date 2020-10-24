<?php

namespace App\Http\Controllers;

use App\Genres;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function insertGenre(Request $req){
        $newGenre = new Genres();
        $newGenre->nama = $req['nama'];
        $newGenre->status = 1;
        $genreInsert = $newGenre->save();

        if($genreInsert){
            return redirect()
                ->back()
                ->with("success", "Succsess insert new genre!");
        } else {
            return redirect()
                ->back()
                ->with("error", "Failed add new genre!");
        }
    }

    public function showGenre(){
        $genreArr = Genres::all();

        return \view('genre.list', ['genreArr' => $genreArr]);
    }

    public function editForm($id){
        $genre = Genres::where('id', $id)
                    ->first();

        return \view('genre.edit', ['genre' => $genre]);
    }

    public function edit(Request $req, $id){
        $genreUpdate = Genres::where('id', $id)
                ->update(['nama' => $req['nama'] ]);

        if($genreUpdate){
            return redirect()
                ->route('genreList')
                ->with("success", "Succsess update genre!");
        } else {
            return redirect()
                ->route('genreList')
                ->with("error", "Failed update genre!");
        }
    }

    public function active(Request $req, $id){
        $genreUpdate = Genres::where('id', $id)
                ->update(['status' => 1 ]);

        if($genreUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function nonActive(Request $req, $id){
        $genreUpdate = Genres::where('id', $id)
                ->update(['status' => 0 ]);

        if($genreUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }
}
