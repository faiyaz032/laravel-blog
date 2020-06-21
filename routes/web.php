<?php

use App\Post;
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
    $posts = Post::orderBy('id', 'desc')->limit(5)->get();
    return view('welcome', compact('posts'));
});

Auth::routes();

Route::get('user/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['auth']], function (){
    Route::get('user/posts', 'PostController@index')->name('admin.all.posts');
    Route::get('user/Myposts', 'PostController@myPost')->name('admin.my.posts');
    Route::get('user/post/create', 'PostController@create')->name('post.create');
    Route::post('user/posts', 'PostController@store')->name('post.store');

    Route::delete('user/post/delete/{post}', 'PostController@destroy')->name('post.destroy');

    Route::resource('user/categories', 'CategoryController');

    Route::post('user/post/{post}/comment', 'CommentController@store')->name('comment.store');
});
Route::get('post/{post}', 'PostController@show')->name('post.show');
