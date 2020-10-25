<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UserController extends Controller
{
    public function showUser(){
        $UserArr = Users::where('role_user', '1')
                    ->get();

        return \view('user.list', ['UserArr' => $UserArr]);
    }

    public function active(Request $req, $id){
        $userUpdate= Users::where('id', $id)
                ->update(['status_user' => 1]);

        if($userUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function nonActive(Request $req, $id){
        $userUpdate= Users::where('id', $id)
                ->update(['status_user' => 0]);

        if($userUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }
}
