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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'PostController@skills')->name('home');



Route::get('/skills', 'PostController@skills')->name('skills');



Route::view('/find_skills', 'find_skills')->name('find_skills');

Route::get('/portfolio', 'PortfolioController@portfolio')->name('portfolio');


Route::view('/more', 'more')->name('more');

Route::view('/about_us', 'about_us')->name('about_us');

Route::view('/FAQ', 'FAQ')->name('FAQ');

Route::get('/livesearches','BooksController@searchIndex')->name('books.search');
Route::post('/live','BooksController@search')->name('books.search'); 



Route::get('/search1','SearchController@index')->name('search1');

Route::get('/search2','SearchController@search');

Route::view('/noresults','SearchController@noresults' )->name('noresults');



Route::get('my-posts', 'PostController@myPosts');

Route::resource('posts','PostController');

Route::get('/likers/{id}', 'ViewController@likers')->name('likers');

Route::get('/followers/{id}', 'ViewController@followers')->name('followers');

Route::resource('crud', 'CRUDController');



Route::view('/edit', 'edit')->name('edit');

Route::get('/edit', 'PostController@edit')->name('edit');

Route::post('/like', 'PostController@like')->name('like');

Route::post('/count', 'PostController@count')->name('count');


Route::post('/follow', 'PostController@follow')->name('follow');

Route::post('/countfollow', 'PostController@countfollow')->name('countfollow');




Route::view('/test', 'test')->name('test');


Route::post('my-form','TestController@myformPost');


Route::resource('articles','ArticleController');


Route::resource('viewit','ViewController');

Route::resource('viewit2' , 'ViewsearchController');


Route::resource('message', 'ChatController');

Route::post('messagepost', 'ChatController@messagepost')->name('messagepost');

Route::get('messageread', 'ChatController@messageread')->name('messageread');

Route::view('imagesupload', 'imagesupload')->name('imagesupload');

Route::post('imagesupload', 'UploadController@imagesUploadPost')->name('imagesuploaded');

Route::post('imagedescr', 'ImageUploadController@imagedescr')->name('imagedescr');

Route::view('photos-upload', 'pictures')->name('pictures');

Route::post('photos-upload' ,'PhotoController@photosupload')->name('photosuploading');

Route::get('messagepage', 'ChatController@messagesenders')->name('messagepage');

Route::get('messageno', 'ChatController@messageno')->name('messageno');

