<?php

use App\Genres;
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

Route::get('/', function () {
    return view('admin');
});

Route::prefix("/book")->group(function(){
    // halaman list buku
    Route::get('/list', 'BookController@showBook')->name('BookList');
    Route::post('/list','BookController@showBook')->name('BookList');

    // insert Book
    Route::get('/insert', 'BookController@insertForm');
    Route::post('/insert', 'BookController@insertForm');
    Route::get('/insertBook', 'BookController@insertBook');
    Route::post('/insertBook', 'BookController@insertBook');

    // me-aktifkan kembali Book
    Route::get('/active/{id}', 'BookController@active');
    Route::post('/active/{id}', 'BookController@active');

    // me-non-aktifkan Book
    Route::get('/nonActive/{id}', 'BookController@nonActive');
    Route::post('/nonActive/{id}', 'BookController@nonActive');

    // mengedit Book
    Route::get('/editForm/{id}', 'BookController@editForm');
    Route::post('/editForm/{id}', 'BookController@editForm');
    Route::get('/edit/{id}', 'BookController@edit');
    Route::post('/edit/{id}', 'BookController@edit');
});

Route::prefix("/genre")->group(function(){
    // halaman list genre
    Route::get('/list', 'GenreController@showGenre')->name('genreList');
    Route::post('/list', 'GenreController@showGenre')->name('genreList');

    // insert genre
    Route::get('/insert', function () {
        return view('genre.insert');
    });
    Route::post('/insert', function () {
        return view('genre.insert');
    });
    Route::get('/insertGenre', 'GenreController@insertGenre');
    Route::post('/insertGenre', 'GenreController@insertGenre');

    // me-aktifkan kembali genre
    Route::get('/active/{id}', 'GenreController@active');
    Route::post('/active/{id}', 'GenreController@active');

    // me-non-aktifkan genre
    Route::get('/nonActive/{id}', 'GenreController@nonActive');
    Route::post('/nonActive/{id}', 'GenreController@nonActive');

    // mengedit genre
    Route::get('/editForm/{id}', 'GenreController@editForm');
    Route::post('/editForm/{id}', 'GenreController@editForm');
    Route::get('/edit/{id}', 'GenreController@edit');
    Route::post('/edit/{id}', 'GenreController@edit');
});

Route::prefix("/admin")->group(function(){
    // halaman list admin
    Route::get('/list', 'AdminController@showAdmin')->name('AdminList');
    Route::post('/list', 'AdminController@showAdmin')->name('AdminList');

    // insert admin
    Route::get('/insert', function () {
        return view('admin.insert');
    });
    Route::post('/insert', function () {
        return view('admin.insert');
    });
    Route::get('/insertAdmin', 'AdminController@insertAdmin');
    Route::post('/insertAdmin', 'AdminController@insertAdmin');

    // me-aktifkan kembali admin
    Route::get('/active/{id}', 'AdminController@active');
    Route::post('/active/{id}', 'AdminController@active');

    // me-non-aktifkan admin
    Route::get('/nonActive/{id}', 'AdminController@nonActive');
    Route::post('/nonActive/{id}', 'AdminController@nonActive');

    // mengedit admin
    Route::get('/editForm/{id}', 'AdminController@editForm');
    Route::post('/editForm/{id}', 'AdminController@editForm');
    Route::get('/edit/{id}', 'AdminController@edit');
    Route::post('/edit/{id}', 'AdminController@edit');
});

Route::prefix("/user")->group(function(){
    // halaman list User
    Route::get('/list', 'UserController@showUser')->name('UserList');
    Route::post('/list', 'UserController@showUser')->name('UserList');

    // me-aktifkan kembali User
    Route::get('/active/{id}', 'UserController@active');
    Route::post('/active/{id}', 'UserController@active');

    // me-non-aktifkan User
    Route::get('/nonActive/{id}', 'UserController@nonActive');
    Route::post('/nonActive/{id}', 'UserController@nonActive');
});
