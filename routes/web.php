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

/* Route::get('/', function () {
    return view('welcome');
});*/
route::namespace('front')->group(function(){

    Route::get('/', 'homepagecontroller@index')->name('front.homepage'); 
   
});
//----------------------------------------------------------------------------
route::namespace('admin')->prefix('/dashboard')->group(function(){

    Route::get('/login', 'authcontroller@login')->name('admin.login');
    Route::post('/dologin', 'authcontroller@dologin')->name('admin.dologin');
   

Route::middleware('adminauth:admin')->group(function(){ //middleware name adminauth 3la guard el admin 

     Route::get('', 'homecontroller@index')->name('admin.home'); //awl saf7a 5als
     Route::get('/logout', 'authcontroller@logout')->name('admin.logout'); //logout
    
      //cat
     Route::get('/cats', 'CatController@index')->name('admin.cat.index'); 
     Route::get('/cats/create', 'CatController@create')->name('admin.cat.create');
     Route::post('/cats/store', 'CatController@store')->name('admin.cat.store'); 
     Route::get('/cats/edit/{id}', 'CatController@edit')->name('admin.cat.edit'); 
     Route::get('/cats/update', 'CatController@update')->name('admin.cat.update');  
     Route::get('/cats/delete/{id}', 'CatController@delete')->name('admin.cat.delete'); 
     //________________________________________________________________________________________________________________
     //courses
     Route::get('/courses', 'courseController@index')->name('admin.course.index'); 
     Route::get('/courses/create', 'courseController@create')->name('admin.course.create');   
     Route::post('/courses/store', 'courseController@store')->name('admin.course.store');   
     Route::get('/courses/edit/{id}', 'courseController@edit')->name('admin.course.edit'); 
     Route::get('/courses/update', 'courseController@update')->name('admin.course.update');   
     Route::get('/courses/delete/{id}', 'courseController@delete')->name('admin.course.delete');
     Route::get('/courses/{id}', 'courseController@seemore')->name('admin.course.seemore');  
     //________________________________________________________________________________________________________________
     //trainers
     Route::get('/trainers', 'trainerController@index')->name('admin.trainer.index'); 
     Route::get('/trainers/create', 'trainerController@create')->name('admin.trainer.create');  
     Route::post('/trainers/store', 'trainerController@store')->name('admin.trainer.store'); 
     Route::get('/trainers/edit/{id}', 'trainerController@edit')->name('admin.trainer.edit');
     Route::get('/trainers/update', 'trainerController@update')->name('admin.trainer.update');   
     Route::get('/trainers/delete/{id}', 'trainerController@delete')->name('admin.trainer.delete');

    });

    
});
