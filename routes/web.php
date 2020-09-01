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
Route::get('tutorial/categories/{id}', 'ThemeCategoriesController')->name('tutorials');
Route::get('tutorial/category/{id}', 'ThemeCategoryController')->name('tutorials.category');
Route::get('tutorial/post/{id}', 'ThemePostController')->name('tutorials.category.post');
Route::resource('/tutorial/comment','ThemeCommentController')->only('store')->names('tutorial.comment');

$blogGroup = ['namespace'=>'Blog'];

Route::group($blogGroup, function(){
 Route::get('/blog', 'BlogController')->name('blog');
 Route::get('/blog/category/{id}', 'BlogCategoryController')->name('blog.category');
 Route::get('/blog/post/{id}', 'BlogPostController')->name('blog.category.post');
 Route::resource('/comment','BlogCommentController', ['only'=>['store']]);
});

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

	Route::resource('/comments', 'Blog\CommentController')
	     ->only($methods)
	     ->names('admin.comments');

  Route::resource('/tutorials/theme', 'Tutorials\ThemeController')
	  ->only($methods)
	  ->names('admin.tutorials.theme');

  Route::resource('/tutorials/category', 'Tutorials\CategoryController')
	 ->only($methods)
	 ->names('admin.tutorials.category');

  Route::resource('/tutorials/post', 'Tutorials\ThemePostController')
	 ->only($methods)
	 ->names('admin.tutorials.post');

	Route::resource('/tutorials/comments', 'Tutorials\CommentController')
	     ->only($methods)
	     ->names('admin.tutorials.comments');

});

