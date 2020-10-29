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

        return \view('vip.list', ['vipArr' => $vipArr,
                                    'userLogin' => $user]);
    }
}
