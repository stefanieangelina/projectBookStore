<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vip;
use Illuminate\Support\Facades\Auth;

class VipController extends Controller
{
    public function insertForm(){
        $userArr = User::where('role', 'Customer');
        $user  = Auth::user()->name;

        return \view('vip.insert', ['userArr' => $userArr,
                                    'userLogin' => $user]);
    }

    public function showVip(){
        $vipArr = Vip::withTrashed()->get();
        $user  = Auth::user()->name;
        $userArr = User::get();

        return \view('vip.list', [
                                    'userArr' => $userArr,
                                    'vipArr' => $vipArr,
                                    'userLogin' => $user]);
    }

    public function active(Request $req, $id){
        $userUpdate = VIP::where('id',$id)->restore();

        if($userUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function nonActive(Request $req, $id){
        $userUpdate = VIP::find($id)->delete();

        if($userUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }
}
