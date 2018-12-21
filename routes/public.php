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

//use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('posts/{post}', [
    'as' => 'posts.show',
    'uses' => 'PostController@show',
])->where('post', '\d+');
//O se puede usar ->where('post', '[0-9]+') ya que son iguales

//Route::get('posts/{post}', function (Post $post) {
//    return view('posts.show', compact('post'));
//})->name('posts.show');