<?php

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




Route::group(['middleware'=>['auth']],function(){
    Route::get('/','HomeController@home')->name('home');
    Route::get('/logout', function () {
        \Illuminate\Support\Facades\Auth::logout();
        return \Illuminate\Support\Facades\Redirect::to(route('home'));
    })->name('logout');
    Route::get('/user/chats','UserController@chats')->name('home.user.chats');
    Route::post('/user/chat/messages','MessagesController@get_messages')->name('home.user.get.messages');
    Route::post('/user/chat','MessagesController@send_message')->name('home.user.send.message');
    Route::post('/user/chat/header','MessagesController@chat_header')->name('home.user.chat.header');
    Route::post('/user/chat/body','MessagesController@chat_body')->name('home.user.chat.body');
    Route::post('/user/chat/footer','MessagesController@chat_footer')->name('home.user.chat.footer');
});

Auth::routes();

