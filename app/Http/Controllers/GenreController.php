<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function insertGenre(Request $req){
        $newGenre = new Genre();
        $newGenre->name = $req['nama'];
        // $newGenre->status = 1;
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
        $genreArr = Genre::withTrashed()->get();

        return \view('genre.list', ['genreArr' => $genreArr]);
    }

    public function editForm($id){
        $genre = Genre::where('id', $id)
                    ->first();

        return \view('genre.edit', ['genre' => $genre]);
    }

    public function edit(Request $req, $id){
        $genreUpdate = Genre::find($id);
        $genreUpdate->name = $req['nama'];
        $genreUpdate->save();

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
        $genreUpdate = Genre::where('id', $id)
                ->restore();

        if($genreUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function nonActive(Request $req, $id){
        $genreUpdate = Genre::where('id', $id)
                ->delete();

        if($genreUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }
}
