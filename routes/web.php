<?php

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

//ここではクライアントからのアクセスに対応してどういう処理をするか決める
//「http://.../○○というアドレスにアクセスしたら、××コントローラの△△アクションを実行する」場所

//起動時初期画面
Route::get('/', function () {
    $response = "";
    return view('/login', compact('response'));
});

//ログイン確認
Route::POST('/login', 'App\Http\Controllers\LoginController@login');
