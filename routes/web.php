<?php

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// トップ画面
Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->middleware('auth');

// 本を追加するボタン押下時
Route::post('/book', [App\Http\Controllers\BookController::class, 'add']);

Route::delete('/book/{book}', [App\Http\Controllers\BookController::class, 'delete']);

Route::get('/bookList', [App\Http\Controllers\BookListController::class, 'index'])->middleware('auth');

Route::post('/bookList', [App\Http\Controllers\BookListController::class, 'search'])->middleware('auth');
// TODO:削除予定
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
