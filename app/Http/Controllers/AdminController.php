<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class AdminController extends Controller
{
    public function insertAdmin(Request $req){
        $newAdmin = new Users();
        $newAdmin->username = $req['username'];
        $newAdmin->email_user = $req['email'];
        $newAdmin->password_user = password_hash($req['pass'], PASSWORD_DEFAULT);
        $newAdmin->alamat_user = $req['alamat'];
        $newAdmin->telepon_user = $req['telepon'];
        $newAdmin->role_user = '0';
        $newAdmin->status_member = '0';
        $newAdmin->status_user = 1;
        $AdminInsert = $newAdmin->save();

        if($AdminInsert){
            return redirect()
                ->back()
                ->with("success", "Succsess insert new Admin!");
        } else {
            return redirect()
                ->back()
                ->with("error", "Failed add new Admin!");
        }
    }

    public function showAdmin(){
        $AdminArr = Users::where('role_user', '0')
                    ->get();

        return \view('admin.list', ['AdminArr' => $AdminArr]);
    }

    public function editForm($id){
        $Admin = Users::where('id', $id)
                ->first();

        return \view('admin.edit', ['Admin' => $Admin]);
    }

    public function edit(Request $req, $id){
        $AdminUpdate = Users::findOrFail($id);
        $AdminUpdate->email_user = $req['email'];
        //AdminUpdate->password_user = password_hash($req['pass'], PASSWORD_DEFAULT);
        $AdminUpdate->alamat_user = $req['alamat'];
        $AdminUpdate->telepon_user = $req['telepon'];
        $AdminInsert = $AdminUpdate->save();

        if($AdminInsert){
            return redirect()
                ->route('AdminList')
                ->with("success", "Succsess update Admin!");
        } else {
            return redirect()
                ->route('AdminList')
                ->with("error", "Failed update Admin!");
        }
    }

    public function active(Request $req, $id){
        $AdminUpdate= Users::where('id', $id)
                ->update(['status_user' => 1]);

        if($AdminUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function nonActive(Request $req, $id){
        $AdminUpdate= Users::where('id', $id)
                ->update(['status_user' => 0]);

        if($AdminUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }
}
