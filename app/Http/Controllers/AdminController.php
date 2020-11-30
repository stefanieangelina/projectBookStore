<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function insertForm(){
        $genreArr = User::all();
        $user  = Auth::user()->name;

        return \view('admin.insert', ['userLogin' => $user]);
    }

    public function insertAdmin(Request $req){
        $newAdmin = new User();
        $newAdmin->name = $req['username'];
        $newAdmin->email = $req['email'];
        $newAdmin->password = password_hash($req['pass'], PASSWORD_DEFAULT);
        $newAdmin->address = $req['alamat'];
        $newAdmin->phone = $req['telepon'];
        $newAdmin->role = 'Admin';
        $newAdmin->isMember = '0';
        $AdminInsert = $newAdmin->save();

        if($AdminInsert){
            return \redirect()
                ->back()
                ->with("success", "Succsess insert new Admin!");
        } else {
            return \redirect()
                ->back()
                ->with("error", "Failed add new Admin!");
        }
    }

    public function showAdmin(){
        $AdminArr = User::where('role', 'Admin')
                    ->get();

        $user  = Auth::user()->name;

        return \view('admin.list', ['AdminArr' => $AdminArr,
                                    'userLogin' => $user]);
    }

    public function editForm($id){
        $Admin = User::where('id', $id)
                ->first();

        $user  = Auth::user()->name;

        return \view('admin.edit', ['Admin' => $Admin, 'userLogin' => $user]);
    }

    public function edit(Request $req, $id){
        $AdminUpdate = User::findOrFail($id);
        //$AdminUpdate->name = $req['username'];
        $AdminUpdate->email = $req['email'];
        //$AdminUpdate->password_user = password_hash($req['pass'], PASSWORD_DEFAULT);
        $AdminUpdate->address = $req['alamat'];
        $AdminUpdate->phone = $req['telepon'];
        $AdminInsert = $AdminUpdate->save();

        if($AdminInsert){
            return \redirect()
                ->route('AdminList')
                ->with("success", "Succsess update Admin!");
        } else {
            return \redirect()
                ->route('AdminList')
                ->with("error", "Failed update Admin!");
        }
    }

    public function active(Request $req, $id){
        $AdminUpdate= User::where('id', $id)
                    ->restore();

        return \redirect()
            ->back();
    }

    public function nonActive(Request $req, $id){
        $AdminUpdate= User::where('id', $id)
                    ->delete();

                //->update(['status_user' => 0]);

        return \redirect()
            ->back();
    }

    public function transaksi(){

        //return view('listPembayaran', ['' => ]);
        return \view('listPembayaran');
    }
}
