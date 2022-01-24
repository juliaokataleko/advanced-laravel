<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\PostCard;
use App\PostCardSendingService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;

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

// Macros
Route::get('macros', function() {
    // dd(Str::prefix(123456466));

    // using macros to format currency
    dd(Str::formatCurrency(100000));

    return Response::errorJson("An error occurred! BOOM!!");
});

// pipelines
Route::get('movies', [MovieController::class, 'index']);

// Repository pattern
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{customerId}/show', [CustomerController::class, 'show']);
Route::get('/customers/{customerId}/update', [CustomerController::class, 'update']);
Route::get('/customers/{customerId}/delete', [CustomerController::class, 'destroy']);

// Lazy Collections
Route::get('lazy', function() {
    // $collection = Collection::times(10000)
    // ->map(function($number) {
    //     return pow(2, $number);
    // })
    // ->all();

    $collection = LazyCollection::times(100000000)
    ->map(function ($number) {
        return pow(2, $number);
    })
    ->all();

    User::cursor();

    return 'done!';
});

Route::get('/generators', function() {

    // function notHappyFunction($number) {
    //     $return = [];

    //     for ($i=0; $i < $number; $i++) { 
    //         $return[] = $i;
    //     }

    //     return $return;
    // }

    function happyFunction($number)
    {
        for ($i = 0; $i < $number; $i++) {
            yield $i;
        }
    }

    // function happyFunction($strings) {

    //     foreach ($strings as $key => $string) {
    //         dump('start');
    //         yield $string;
    //         dump('end');
    //     }
     
    // }

    foreach (happyFunction(10000000) as $number) {
        if($number % 1000 == 0) {
            dump("hello");
        }
    }

});