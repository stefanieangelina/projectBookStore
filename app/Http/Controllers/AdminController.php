<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class AdminController extends Controller
{
    public function insertAdmin(Request $req){
        $newAdmin = new Users();
        $newAdmin->name = $req['username'];
        $newAdmin->email = $req['email'];
        $newAdmin->password_user = password_hash($req['pass'], PASSWORD_DEFAULT);
        $newAdmin->address = $req['alamat'];
        $newAdmin->phone = $req['telepon'];
        $newAdmin->role = 'Admin';
        $newAdmin->isMember = '0';
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
        $AdminArr = Users::where('role', 'Admin')
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
        //$AdminUpdate->name = $req['username'];
        $AdminUpdate->email = $req['email'];
        //$AdminUpdate->password_user = password_hash($req['pass'], PASSWORD_DEFAULT);
        $AdminUpdate->address = $req['alamat'];
        $AdminUpdate->phone = $req['telepon'];
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
                    ->restore();

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
                    ->delete();

                //->update(['status_user' => 0]);

        if($AdminUpdate){
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }
}
