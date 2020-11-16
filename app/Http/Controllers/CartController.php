<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Wishlist;

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
        // left join books as b on c.book_id = b.id;
        $arrCart = DB::table('carts as c')
                ->leftJoin('books as b', 'c.book_id', '=', 'b.id')
                ->where('c.user_id', $userId)
                ->where('c.deleted_at', NULL)
                ->get();

        $ctr = 1;

        dd($arrCart);

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
}
