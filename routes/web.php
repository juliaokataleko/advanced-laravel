<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\PostController;
use App\PostCard;
use App\PostCardSendingService;
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

// lesson 4 - facades
Route::get('posts', function() {
    $post_card_service = new PostCardSendingService('us', 4, 6);
    $post_card_service->hello("Hello from coders tape USA", 'test@test.com');
});

Route::get('facades',function() {
    PostCard::hello("Good Morning Angola", 'test@test.com');
});