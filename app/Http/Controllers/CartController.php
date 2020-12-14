<?php

namespace App\Http\Controllers;

use App\Cart;
use Dotenv\Result\Success;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Wishlist;
use App\htrans;
use App\dtrans;
use App\Books;
use App\Users;
use App\Vip;



class CartController extends Controller
{
    public function AddToCart($id){
        $userId  = Auth::user()->id;

        $cart = Cart::where('book_id', $id)
                    ->where('user_id', $userId)
                    ->where('deleted_at', NULL)
                    ->count();

        if($cart == 0){
            $newCart = new Cart;
            $newCart->qty = 1;
            $newCart->user_id = $userId;
            $newCart->book_id = $id;
            $newCart->save();

            return \redirect()
                    ->back()
                    ->with('success', 'Success add book to cart!');
        } else {
            $cart = Cart::where('book_id', $id)
                    ->where('user_id', $userId)
                    ->where('deleted_at', NULL)
                    ->first();
            $qty = $cart->qty;
            $qty++;

            Cart::where('id', $id)
                ->update(array('qty' => $qty));

            return \redirect()
                    ->back();
        }
    }

    public function showCart(){
        $userId  = Auth::user()->id;

        // SELECT * FROM carts as c
        // left join books as b on c.book_id = b.id
        // WHERE c.user_id = 3 and c.deleted_at = null;
        $arrCart = DB::table('carts as c')
                ->join('books as b', 'c.book_id', '=', 'b.id')
                ->where('c.user_id', $userId)
                ->where('c.deleted_at', null)
                ->select('c.id', 'b.name', 'c.qty', 'b.sell_price', 'b.discount', 'b.stock')
                ->get();

        $ctr = 1;
        //dd($arrCart);

        return \view('user.cart', ['arrCart'=>$arrCart, 'ctr'=>$ctr]);
    }

    public function qtyUp(Request $req, $id){
        $qty = $req->qty;
        $qty++;

        Cart::where('id', $id)
            ->update(array('qty' => $qty));

        return \redirect()->back();
    }

    public function qtyDown(Request $req, $id){
        $qty = $req->qty;
        $qty--;

        Cart::where('id', $id)
            ->update(array('qty' => $qty));

        return \redirect()->back();
    }

    public function deleteCart(Request $req, $id){
        Cart::where('id', $id)
                ->delete();

        return redirect()
            ->back();
    }
    public function konfirmasiPayment(Request $request){

        $ext = $request->file("bukti")->getClientOriginalExtension();
        $nama = $request->htransID.".".$ext;
        $request->file("bukti")->storeAs("BuktiBayar", $nama, "public");
        htrans::where('id', $request->htransID)
        ->update(array('file_bukti' => $nama));
        return redirect('/home');
    }
    public function checkout(Request $request)
    {
        for ($x = 1; $x <= $request->temp ; $x++) {
            Cart::where('id', $request->input('id'.$x))
            ->update(array('qty' => $request->input('qty'.$x)));
        }
        $validateData =[
            'pengiriman'=>'required'
        ];
        $customMassage = [
            'required' => 'Pengiriman tidak boleh kosong..!!'
        ];
        $this->validate($request,$validateData,$customMassage);

        $userId  = Auth::user()->id;

        // SELECT * FROM carts as c
        // left join books as b on c.book_id = b.id
        // WHERE c.user_id = 3 and c.deleted_at = null;
        $arrCart = DB::table('carts as c')
                ->join('books as b', 'c.book_id', '=', 'b.id')
                ->where('c.user_id', $userId)
                ->where('c.deleted_at', null)
                ->select('c.id','c.book_id', 'b.name', 'c.qty', 'b.sell_price', 'b.discount', 'b.stock')
                ->get();

        $ctr = 1;
        $data =   DB::table('users')
                ->select('name', 'phone','email')
                ->where('id',$userId)
                ->first();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-uHhFZ4w7JAr7rn7UXm41SGLy';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->grandtotal, //JUMLAH TOTAL
            ),
            'customer_details' => array(
                'first_name' => $data->name,
                'last_name' => '',
                'email' => $data->email,
                'phone' => $data->phone,
            ),
        );

        Session::put("listTrans",$arrCart);
        Session::put("total",$request->grandtotal);
        Session::put("jenisKirim",$request->peniriman);
        //dd(Session::get('listTrans'));
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return \view('user.checkout', ["snap_token" => $snapToken,"grandtotal" => $request->grandtotal,'arrCart'=>$arrCart, 'ctr'=>$ctr, 'pengiriman'=>$request->pengiriman,'pembayaran'=>$request->payment]);
    }
    public function manualPayment(Request $request){
        foreach (Session::get('listTrans') as $books) {
            Cart::where('id', $books->id)
                ->delete();
        }
        $newtrans = new htrans();
        $newtrans->cara_pembayaran = "tidak poin";
        $newtrans->total = Session::get('total');
        $newtrans->user_id=Auth::user()->id;
        $newtrans->status = 0;
        $newtrans->file_bukti = "";
        $newtrans->save();
        $htransID=   DB::table('htrans')
        ->select('id')
        ->where('user_id',Auth::user()->id)
        ->where('total',Session::get('total'))
        ->first();
        $userPoint =DB::table('users')
        ->select('points')
        ->where('id',Auth::user()->id)
        ->first();
        $calcpoint = intval(floor(Session::get('total') /100000));
        foreach (Session::get('listTrans') as $books) {
            $dtrans = new dtrans();
            $dtrans->htrans_id = $htransID->id;
            $dtrans->books_id =$books->book_id;
            $dtrans->banyak = $books->qty;
            $temp = $books->sell_price - $books->discount;
            $dtrans->satuan = $temp;
            $dtrans->jumlah = $temp * $books->qty;
            $dtrans->save();
            $stok = $books->stock - $books->qty;
            Books::where('id', $books->book_id)
            ->update(['stock' => $stok]);

        }
        if  (Session::get('total')>=500000){
            $member =DB::table('users')
            ->select('isMember')
            ->where('id',Auth::user()->id)
            ->first();
            if($member->isMember =="1"){
                Users::where('id', Auth::user()->id)
                ->update(['points' => $userPoint->points + $calcpoint]);
            }else if($member->isMember =="0"){
                Users::where('id', Auth::user()->id)
                ->update(['isMember' => 1]);
                $newVip = new Vip();
                $newVip->status =1;
                $newVip->user_id = Auth::user()->id;
                $newVip->save();
                Users::where('id', Auth::user()->id)
                ->update(['points' => $userPoint->points + $calcpoint]);
            }
        }
    //dd(Session::get('listTrans'));
        return view('user.success',['id_htrans' =>$htransID->id]);
    }
    public function fTrans(){
        foreach (Session::get('listTrans') as $books) {
            Cart::where('id', $books->id)
                ->delete();
        }
        $newtrans = new htrans();
        $newtrans->cara_pembayaran = "tidak poin";
        $newtrans->total = Session::get('total');
        $newtrans->user_id=Auth::user()->id;
        $newtrans->status = 1;
        $newtrans->save();
        $htransID=   DB::table('htrans')
        ->select('id')
        ->where('user_id',Auth::user()->id)
        ->where('total',Session::get('total'))
        ->first();
        $userPoint =DB::table('users')
        ->select('points')
        ->where('id',Auth::user()->id)
        ->first();
        $calcpoint = intval(floor(Session::get('total') /100000));
        foreach (Session::get('listTrans') as $books) {
            $dtrans = new dtrans();
            $dtrans->htrans_id = $htransID->id;
            $dtrans->books_id =$books->book_id;
            $dtrans->banyak = $books->qty;
            $temp = $books->sell_price - $books->discount;
            $dtrans->satuan = $temp;
            $dtrans->jumlah = $temp * $books->qty;
            $dtrans->save();
            $stok = $books->stock - $books->qty;
            Books::where('id', $books->book_id)
            ->update(['stock' => $stok]);

        }
        if  (Session::get('total')>=500000){
            $member =DB::table('users')
            ->select('isMember')
            ->where('id',Auth::user()->id)
            ->first();
            if($member->isMember =="1"){
                Users::where('id', Auth::user()->id)
                ->update(['points' => $userPoint->points + $calcpoint]);
            }else if($member->isMember =="0"){
                Users::where('id', Auth::user()->id)
                ->update(['isMember' => 1]);
                $newVip = new Vip();
                $newVip->status =1;
                $newVip->user_id = Auth::user()->id;
                $newVip->save();
                Users::where('id', Auth::user()->id)
                ->update(['points' => $userPoint->points + $calcpoint]);
            }
        }
    //dd(Session::get('listTrans'));
        return view('home');
    }

    public function pointPayment(Request $request){
        $userPoint = Auth::user()->points;
        $userPoint -= 10;
        $id = Auth::user()->id;

        $user = Users::findorFail($id);
        $user->points = $userPoint;
        $user->save();

        foreach (Session::get('listTrans') as $books) {
            Cart::where('id', $books->id)
                ->delete();
        }
        $newtrans = new htrans();
        $newtrans->cara_pembayaran = "poin";
        $newtrans->total = Session::get('total');
        $newtrans->user_id=Auth::user()->id;
        $newtrans->status = 0;
        $newtrans->file_bukti = "";
        $newtrans->save();
        $htransID=   DB::table('htrans')
            ->select('id')
            ->where('user_id',Auth::user()->id)
            ->where('total',Session::get('total'))
            ->first();
        $userPoint =DB::table('users')
            ->select('points')
            ->where('id',Auth::user()->id)
            ->first();
        $calcpoint = intval(floor(Session::get('total') /100000));
        foreach (Session::get('listTrans') as $books) {
            $dtrans = new dtrans();
            $dtrans->htrans_id = $htransID->id;
            $dtrans->books_id =$books->book_id;
            $dtrans->banyak = $books->qty;
            $temp = $books->sell_price - $books->discount;
            $dtrans->satuan = $temp;
            $dtrans->jumlah = $temp * $books->qty;
            $dtrans->save();
            $stok = $books->stock - $books->qty;
            Books::where('id', $books->book_id)
                ->update(['stock' => $stok]);
        }
        if  (Session::get('total')>=500000){
            $member =DB::table('users')
                ->select('isMember')
                ->where('id',Auth::user()->id)
                ->first();
            if($member->isMember =="1"){
                Users::where('id', Auth::user()->id)
                    ->update(['points' => $userPoint->points + $calcpoint]);
            }else if($member->isMember =="0"){
                Users::where('id', Auth::user()->id)
                    ->update(['isMember' => 1]);
                $newVip = new Vip();
                $newVip->status =1;
                $newVip->user_id = Auth::user()->id;
                $newVip->save();
                Users::where('id', Auth::user()->id)
                    ->update(['points' => $userPoint->points + $calcpoint]);
            }
        }

        return redirect('home')
            ->with("success", "Succsess pay with point!");
    }
}
