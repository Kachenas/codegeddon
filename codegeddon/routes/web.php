

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
});	

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'CategoryController@showCategory');
Route::get('/create', 'CategoryController@createCategory');
Route::post('categories/save', 'CategoryController@saveCategory');


Route::get('/category/{id}', 'TopicController@showTopics');
Route::get('/category/{id}/create', 'TopicController@createTopic');
Route::post('/category/{id}/save', 'TopicController@saveTopic');
Route::post('/category/{id}/edit', 'TopicController@editTopic');
Route::get('/category/{id}/delete', 'TopicController@deleteTopic');



Route::post('/comment/{id}', 'PostController@showAnswer');
Route::get('/comment/{id}/delete', 'PostController@deletePost');
Route::post('/comment/{id}/edit', 'PostController@editPost');




