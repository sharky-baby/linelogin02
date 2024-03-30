<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\LineLoginController;

use App\Http\Controllers\ProductController;
// ProductControllerに繋げるために取り込んでいます
use Illuminate\Support\Facades\Auth;
// "Auth"という部品を使うために取り込んでいます。この部品はユーザー認証（ログイン）に関する処理を行います

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    // ウェブサイトのホームページ（'/'のURL）にアクセスした場合のルートです
    if (Auth::check()) {
        // ログイン状態ならば
        return redirect()->route('products.index');
        // 商品一覧ページ（ProductControllerのindexメソッドが処理）へリダイレクトします
    } else {
        // ログイン状態でなければ
        return redirect()->route('login');
        // ログイン画面へリダイレクトします
    }
});
// もしCompanyControllerだった場合は
// companies.index のように、英語の正しい複数形になります。


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/linelogin', 'LineLoginController@lineLogin')->name('linelogin');
Route::get('/linelogin', 'App\Http\Controllers\LineLoginController@lineLogin')->name('linelogin');
Route::get('/callback', 'App\Http\Controllers\LineLoginController@callback')->name('callback');
// Route::get('/callback', 'LineLoginController@callback')->name('callback');


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('products', ProductController::class);
});