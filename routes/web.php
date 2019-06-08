<?php
#Paziti s rutama, laravel cita file odozgo prema dole!
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


Route::group(['middleware' => ['web']], function (){
    //Auth rute
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    //register  rute
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    //Kategorije
    Route::resource('categories','CategoryController', ['except' => ['create']]);//automatski dodaje rute za CRUD

    //Tagovi
    Route::resource('tags','TagController', ['except' => ['create']]);


//KOmentari
    Route::post('comments/{post_id}',['uses' => 'CommentsController@store', 'as' =>'comments.store']);
    Route::get('comments/{id}/edit',['uses' => 'CommentsController@edit', 'as' =>'comments.edit']);
    Route::put('comments/{id}',['uses' => 'CommentsController@update', 'as' =>'comments.update']);
    Route::delete('comments/{id}',['uses' => 'CommentsController@destroy', 'as' =>'comments.destroy']);
    Route::get('comments/{id}/delete',['uses' => 'CommentsController@delete', 'as' =>'comments.delete']);
    //Ostale rute
    Route::get('/blog/{slug}',['as' => 'blog.single','uses' =>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+'); //eksplicitno navedemo koji format slug-a podrzavamo (slova,brojevi,- i _)
    Route::get('/', 'PagesController@getIndex');
    Route::get('/about', 'PagesController@getAbout');
    Route::resource('posts','PostController');
});

