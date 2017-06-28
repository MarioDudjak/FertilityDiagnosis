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

Route::get('/', function () {
    return view('welcome');
}) ->name('welcome');

Route::get('/login', function () {
    return view('login');
});



Route::get('/register', function () {
    return view('register');
});

Route::get('/home',[
    'uses' => 'PostController@getDashboard',
    'as'=> 'home',
    'middleware'=> 'guest'
]);

Route::post('/signup',[
    'uses' => 'UserController@postSignUp',
    'as'=> 'signup'
]);

Route::post('/signin',[
    'uses' => 'UserController@postSignIn',
    'as'=> 'signin'
]);

Route::get('/logout',[
    'uses'=>'UserController@getLogout',
    'as'=>'logout'
]);

Route::post('/createpost',[
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware'=> 'guest'
]);

Route::get('/delete-post/{post_id}',[
    'uses' => 'PostController@getDeletePost',
    'as'=>'post.delete',
    'middleware'=> 'guest'
]);


Route::post('/edit',[
    'uses' => 'PostController@postEditPost',
    'as' => 'edit'
]);

Route::get('/account',[
    'uses' => 'UserController@getAccount',
    'as' =>'account'
]);

Route::post('/updateaccount',[
    'uses'=>'UserController@postSaveAccount',
    'as'=>'account.save'
]);

Route::get('/userimage/{filename}',[
    'uses'=>'UserController@getUserImage',
    'as'=>'account.image'
]);

Route::post('/like',[
    'uses'=>'PostController@postLikePost',
    'as'=>'like'
]);

Route::get('/fertility_tool',[
    'uses'=>'ToolController@getFertilityTool',
    'as'=>'fertility_tool',
    'middleware'=> 'guest'

]);

Route::post('/result',[
    'uses'=>'ToolController@postResult',
    'as'=>'result'
]);

Route::post('/publishResult',[
    'uses' => 'ToolController@publishResult',
    'as'=> 'publishResult'
]);

Route::post('/contact',[
    'uses' => 'UserController@contact',
    'as'=> 'contact'
]);

Route::get('/stats',[
    'uses'=>'ToolController@getStats',
    'as'=>'stats',
    'middleware'=> 'guest'

]);

Route::post('/Chart',[
    'uses'=>'ToolController@getChart',
    'as'=>'getChart'
]);

