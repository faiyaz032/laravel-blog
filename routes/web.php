<?php

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

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['auth']], function (){
    Route::get('admin/posts', 'PostController@index')->name('admin.all.posts');
    Route::get('admin/Myposts', 'PostController@myPost')->name('admin.my.posts');
    Route::get('admin/post/create', 'PostController@create')->name('post.create');
    Route::delete('admin/post/delete/{post}', 'PostController@destroy')->name('post.destroy');

});
