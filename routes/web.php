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
| Route::get('/', function () {
|     return view('welcome');
| });
|
*/

// Authentication Routes
Auth::routes();

// Logout Routes
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Home after login or register
Route::get('/home', 'HomeController@index');

// Single Routes // Using WHERE to validate URL 
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+'); 

// Posts Archives Routes
Route::get('blog', ['uses' => 'BlogController@getArchive', 'as' => 'blog.archive']);

// Categories Route
Route::resource('categories', 'CategoryController', ['except' => ['create']]); // The EXCEPT func is for removing specific function in route // The ONLY is vice versa

// Comments Route
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);

// Tag Route
Route::resource('tags', 'TagController', ['except' => ['create']]); 

// Pages Routes
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

// Posts Routes
Route::resource('posts', 'PostController');

