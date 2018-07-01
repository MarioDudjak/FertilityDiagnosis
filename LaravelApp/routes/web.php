<?php
use App\User;
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
}) ->name('login');



Route::get('/register', function () {
    return view('register');
}) ->name('register');

Route::get('/home',[
    'uses' => 'PostController@Dashboard',
    'as'=> 'home',
    'middleware'=> 'auth'
]);

Route::post('/signup',[
    'uses' => 'UserController@SignUp',
    'as'=> 'signup'
]);

Route::post('/signin',[
    'uses' => 'UserController@SignIn',
    'as'=> 'signin'
]);

Route::get('/logout',[
    'uses'=>'UserController@Logout',
    'as'=>'logout'
]);

Route::post('/createpost',[
    'uses' => 'PostController@CreatePost',
    'as' => 'post.create',
    'middleware'=> 'auth'
]);

Route::get('/delete-post/{post_id}',[
    'uses' => 'PostController@DeletePost',
    'as'=>'post.delete',
    'middleware'=> 'auth'
]);


Route::post('/edit',[
    'uses' => 'PostController@EditPost',
    'as' => 'edit',
    'middleware'=> 'auth'
]);

Route::get('/account',[
    'uses' => 'UserController@Account',
    'as' =>'account',
    'middleware'=> 'auth'    
]);

Route::post('/updateaccount',[
    'uses'=>'UserController@SaveAccount',
    'as'=>'account.save',
    'middleware'=> 'auth'    
]);

Route::get('/userimage/{filename}',[
    'uses'=>'UserController@UserImage',
    'as'=>'account.image',
    'middleware'=> 'auth'    
]);

Route::post('/like',[
    'uses'=>'PostController@LikePost',
    'as'=>'like',
    'middleware'=> 'auth'    
]);

Route::get('/fertility_tool',[
    'uses'=>'ToolController@getFertilityTool',
    'as'=>'fertility_tool',
    'middleware'=> 'auth'

]);

Route::post('/result',[
    'uses'=>'ToolController@SaveResult',
    'as'=>'result',
    'middleware'=> 'auth'    
]);

Route::post('/publishResult',[
    'uses' => 'ToolController@PublishResult',
    'as'=> 'publishResult',
    'middleware'=> 'auth'    
]);

Route::post('/contact',[
    'uses' => 'UserController@Contact',
    'as'=> 'contact'
]);

Route::get('/stats',[
    'uses'=>'ToolController@Stats',
    'as'=>'stats',
    'middleware'=> 'auth'
]);

Route::post('/Chart',[
    'uses'=>'ToolController@getChart',
    'as'=>'getChart',
    'middleware'=> 'auth'    
]);

Route::group(['prefix' => 'api/{user_api_key}'], function() {
    Route::get('results', ['uses' => 'NoteController@Results']);
	Route::get('results/normal', ['uses' => 'NoteController@NormalResults']);
	Route::get('results/altered', ['uses' => 'NoteController@AlteredResults']);
});

//API FOR MY ACC:  tICL0ypTCyLAsXBnx3M6nQBwDnyGIT6hSVf6QjTR9FieqM6CoZlunThnPfLw

Route::get('/documentation',[
    'uses'=>'UserController@Documentation',
    'as'=>'documentation',
    'middleware'=> 'auth'

]);