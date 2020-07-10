<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//without login
Route::get('/no-script', function(){
    return view('web/no-script');
});

Route::get('/', 'PostController@get');
Route::get('/post/{id}', 'PostController@detail');

Route::group(['middleware' => function(\Illuminate\Http\Request $request, \Closure $next){

    if($request->session()->exists(\Config::get('web.session'))){
        return redirect('/');
    }
    return $next($request);
}], function (){

    Route::get('/login', 'UserController@login');
    Route::post('/login', 'UserController@postLogin');
    Route::get('/signup', 'UserController@signup');
    Route::post('/signup', 'UserController@postSignup');
});

//without login
Route::group(['middleware' => 'users'], function () {

    Route::get('/post', function(){
        return view('web/post.add');
    });

    Route::post('/post', 'PostController@post');
    Route::post('/post/comment', 'PostController@postComment');
    Route::get('/post/{postId}/comment/delete/{id}', 'PostController@deleteComment');

    Route::get('/logout', function () {
        Session::forget(\Config::get('web.session'));
        return redirect('/login')->cookie(Cookie::forget(\Config::get('web.cookie')));
    });
});