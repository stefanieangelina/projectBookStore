<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUser(){
        $UserArr = User::where('role', 'Customer')->withTrashed()->get();
        $user  = Auth::user()->name;

        return \view('user.list', ['UserArr' => $UserArr, 'userLogin' => $user]);
    }

    public function active(Request $req, $id){
        $userUpdate = User::where('id',$id)->restore();

        if($userUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function nonActive(Request $req, $id){
        $userUpdate = User::find($id)->delete();

        if($userUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function landingPage(Request $req)
    {
        if(Auth::user()->role==='Admin')
        return redirect('admin');
        if(Auth::user()->role==='Customer')
        return redirect('home');
    }

    public function search(Request $req)
    {
        $input = $req->search;
        $cek = Book::where('nama','LIKE',"%$input%")
                        ->orWhere('penulis','LIKE',"%$input%")->get();
        return view('detailDisplay',[
            'data'=>$cek,
            'id' => $req->search
            ]);
    }
}
