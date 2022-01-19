<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\PostController;
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
    return view('welcome');
});

Route::get('pay', [PayOrderController::class, 'store']);

Route::get('channels', [ChannelController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);