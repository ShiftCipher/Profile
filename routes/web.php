<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('certificates', 'CertificatesController');
Route::resource('clients', 'ClientsController');
Route::resource('courses', 'CoursesController');
Route::resource('studies', 'StudiesController');
Route::resource('languages', 'LanguagesController');
Route::resource('photos', 'PhotosController');
Route::resource('projects', 'ProjectsController');
Route::resource('services', 'ServicesController');
Route::resource('skills', 'SkillsController');
