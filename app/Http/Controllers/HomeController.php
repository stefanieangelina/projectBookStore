<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user  = Auth::user()->name;
        // echo ($user);
        $arrBuku = Book::get();
        // dd($arrBuku);
        return view('home', ['arrBuku'=> $arrBuku]);
    }

    public function testingchart(Request $req){
        $dataTrans = DB::table('htrans')
                ->select(DB::raw('month(updated_at) as \'bulan\', COUNT(*) as \'transaksi\''))
                ->where('status', '=', 1)
                ->groupBy('bulan')
                ->get();
        return $dataTrans;
    }
    public function dashboard(){
        return  \view('testingchart');
    }
    public function profil(){
        return \view('profil');
    }

    public function edit(){
        return \view('editProfil');
    }

    public function editProfil(Request $req){
        $input = $req->validate([
            "name" => 'required',
            "alamat" => 'required',
            "nomer" => 'required|min:10',
        ]);

        $id = Auth::user()->id;
        $userUpdate = User::find($id);
        $userUpdate->name = $req['name'];
        $userUpdate->address = $req['alamat'];
        $userUpdate->phone = $req['nomer'];
        $res = $userUpdate->save();

        if($res){
            return redirect()
                ->route('homeProfile')
                ->with("success", "Berhasil update profile!");
        } else {
            return redirect()->back()
                ->with("error", "Gagal update profile!");
        }
    }
}
