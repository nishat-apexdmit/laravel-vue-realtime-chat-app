<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\FriendController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group([
    'middleware' => 'auth',
], function () {
    Route::get('friends', [FriendController::class, 'index'])->name('friends');

    Route::get('chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('chat/{friend_id}', [ChatController::class, 'show'])->name('chat.show');

    Route::post('chat/getChat/{friend_id}', [ChatController::class, 'getChat']);
    Route::post('/chat/sendChat', [ChatController::class, 'sendChat']);
});
