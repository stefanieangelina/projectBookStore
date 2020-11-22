<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function AddToWishlist($id){
        $userId  = Auth::user()->id;

        $arrWishlist = Wishlist::where('user_id', $userId)
                        ->where('book_id', $id)
                        ->where('deleted_at', NULL)
                        ->count();

        if($arrWishlist == 0){
            $newWishlist = new Wishlist;
            $newWishlist->user_id = $userId;
            $newWishlist->book_id = $id;
            $newWishlist->save();

            return \redirect()
                    ->back()
                    ->with('success', 'Add book to wishlist success!');
        } else {
            return \redirect()->back();
        }
    }

    public function showWishlist(){
        $userId  = Auth::user()->id;

        // SELECT * FROM Wishlists as c
        // left join books as b on c.book_id = b.id;
        $arrWishlist = DB::table('Wishlist as w')
                ->join('books as b', 'w.book_id', '=', 'b.id')
                ->where('w.user_id', $userId)
                ->where('w.deleted_at', NULL)
                ->select('w.id', 'b.name', 'b.sell_price', 'b.discount', 'b.stock')
                ->get();

        $ctr = 1;

        return \view('user.wishlist', ['arrWishlist'=>$arrWishlist, 'ctr'=>$ctr]);
    }

    public function deleteWishlist(Request $req, $id){
        Wishlist::where('id', $id)
                ->delete();

        return redirect()
            ->back();
    }
}
