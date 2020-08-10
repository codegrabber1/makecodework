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
Route::get('/', 'IndexController@index')->name('index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Admin panel
 * */
$group=[
  'namespace'   =>'Admin',
  'prefix'      =>'admin',
//  'middleware'  => ['auth']
  'middleware'  => ['auth','can:manage-users']
];

Route::group($group, function(){
  $methods = ['index','create','edit','store','update', 'destroy'];

  Route::resource('/users','UserController' )
    ->only($methods)
    ->names('admin.users');

  Route::resource('/categories', 'Blog\CategoryController')
    ->only($methods)
    ->names('admin.categories');

  Route::resource('/posts', 'Blog\PostController')
	  ->only($methods)
	  ->names('admin.posts');

  Route::resource('/tutorials/theme', 'Tutorials\ThemeController')
	  ->only($methods)
	  ->names('admin.tutorials.theme');

  Route::resource('/tutorials/category', 'Tutorials\CategoryController')
	 ->only($methods)
	 ->names('admin.tutorials.category');

  Route::resource('/tutorials/post', 'Tutorials\ThemePostController')
	 ->only($methods)
	 ->names('admin.tutorials.post');


});

