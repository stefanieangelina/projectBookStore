<?php

use App\Genres;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'UserController@landingPage')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/authcustomer', function () {
    dd('berhasil');
    return view('home');
})->middleware('role:Customer');

Route::get('/authadmin', function () {
    dd('berhasil');
    return view('admin');
})->middleware('role:Admin');

Route::prefix("/book")->group(function(){
    // halaman list buku
    Route::any('/list', 'BookController@showBook')->name('BookList');

    // insert Book
    Route::any('/insert', 'BookController@insertForm');
    Route::any('/insertBook', 'BookController@insertBook');

    // me-aktifkan kembali Book
    Route::any('/active/{id}', 'BookController@active');

    // me-non-aktifkan Book
    Route::any('/nonActive/{id}', 'BookController@nonActive');

    // mengedit Book
    Route::any('/editForm/{id}', 'BookController@editForm');
    Route::any('/edit/{id}', 'BookController@edit');

    Route::any('/addToCart/{id}', 'CartController@AddToCart');
    Route::any('/viewDetail/{id}', 'PageController@ViewDetail');
    Route::any('/addToWishlist/{id}', 'WishlistController@AddToWishList');
});

Route::prefix("/genre")->group(function(){
    // halaman list genre
    Route::any('/list', 'GenreController@showGenre')->name('genreList');

    // insert genre
    Route::any('/insert', 'GenreController@insertForm');
    Route::any('/insertGenre', 'GenreController@insertGenre');


    // me-aktifkan kembali genre
    Route::any('/active/{id}', 'GenreController@active');


    // me-non-aktifkan genre
    Route::any('/nonActive/{id}', 'GenreController@nonActive');


    // mengedit genre
    Route::any('/editForm/{id}', 'GenreController@editForm');

    Route::any('/edit/{id}', 'GenreController@edit');

});

Route::prefix("/admin")->group(function(){

    // Route::any('/showblank', 'AdminController@showBlank')->name('AdminBlank');

    Route::any('/', 'AdminController@showAdmin')->name('AdminDashboard');
    // halaman list admin

    Route::any('/list', 'AdminController@showAdmin')->name('AdminList');


    // insert admin
    Route::any('/insert', 'AdminController@insertForm');
    Route::any('/insertAdmin', 'AdminController@insertAdmin');


    // me-aktifkan kembali admin
    Route::any('/active/{id}', 'AdminController@active');


    // me-non-aktifkan admin
    Route::any('/nonActive/{id}', 'AdminController@nonActive');


    // mengedit admin
    Route::any('/editForm/{id}', 'AdminController@editForm');

    Route::any('/edit/{id}', 'AdminController@edit');

});

Route::prefix("/user")->group(function(){
    // halaman list User
    Route::any('/list', 'UserController@showUser')->name('UserList');

    // me-aktifkan kembali User
    Route::any('/active/{id}', 'UserController@active');

    // me-non-aktifkan User
    Route::any('/nonActive/{id}', 'UserController@nonActive');

});

Route::view("/userPage", 'products');

Route::prefix("/vip")->group(function(){
    // halaman list buku
    Route::any('/list', 'VipController@showVip')->name('VipList');


    // insert Book
    // Route::any('/insert', 'BookController@insertForm');
    // Route::any('/insertBook', 'BookController@insertBook');


    // // me-aktifkan kembali Book
    // Route::any('/active/{id}', 'BookController@active');

    // // me-non-aktifkan Book
    // Route::any('/nonActive/{id}', 'BookController@nonActive');

    // // mengedit Book
    // Route::any('/editForm/{id}', 'BookController@editForm');
    // Route::any('/edit/{id}', 'BookController@edit');
});

Route::any("/showCart", 'CartController@showCart');
Route::any('/qtyUp/{id}', 'CartController@qtyUp');
Route::any('/qtyDown/{id}', 'CartController@qtyDown');
Route::any('/deleteCart/{id}', 'CartController@deleteCart');

Route::any("/showWishlist", 'WishlistController@showWishlist');
Route::any("/deleteWishlist/{id}", 'WishlistController@deleteWishlist');

Route::any('/search', 'PageController@search');

Route::post('/checkout', 'CartController@checkout');
