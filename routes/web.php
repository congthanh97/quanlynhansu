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


Route::prefix('admin')->group(function() {

	// Route::get('login', 'UsersController@getLogin');
	// Route::post('login', 'UsersController@postLogin');

	// Route::get('logout', 'UsersController@logOut');

	Route::get('login', 'AdminController@getLogin');
	Route::post('login', 'AdminController@postLogin');

	Route::get('logout', 'AdminController@logOut');

	Route::get('/', 'AdminController@admin')->middleware('Checklogin');


	Route::get('levels', 'LevelController@getlevel')->middleware('Checklogin');


	Route::get('addLevel', 'LevelController@addLevel')->middleware('Checklogin');
	Route::post('addLevel', 'LevelController@addLevel');


	Route::get('editLevel/{id}', 'LevelController@editLevel')->middleware('Checklogin');
	Route::post('editLevel/{id}', 'LevelController@editLevel');
	
	Route::get('deletelevel/{id}', 'LevelController@deletelevel')->middleware('Checklogin');

	
	// get level id
	Route::get('level/{id}','LevelController@;')->middleware('Checklogin');

	//admin/level/1
	//Route::get('level/1', function () {
		
	//});


	
	Route::middleware(['Checklogin'])->group(function () {
		Route::get('users', 'UsersController@getUsers')->name('users.index');
		Route::get('users-create', 'UsersController@userCreate')->name('users.create');
		Route::post('users-create-save', 'UsersController@userCreateSave')->name('users.create.save');
		Route::get('users-edit/{id}', 'UsersController@userEdit')->name('users.edit');
		Route::post('users-edit-save/{id}', 'UsersController@userEditSave')->name('users.edit.save');
		Route::get('users-delete/{id}', 'UsersController@userDelete')->name('users.delete');
	});

});
