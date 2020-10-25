<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function showUser(){
        $UserArr = User::where('role', 'Customer')->withTrashed()->get();

        return \view('user.list', ['UserArr' => $UserArr]);
    }

    public function active(Request $req, $id){
        $userUpdate= User::where('id',$id)->restore();

        if($userUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function nonActive(Request $req, $id){
        $userUpdate= User::find($id)->delete();

        if($userUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }
}
