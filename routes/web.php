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

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin'], function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/application', 'HomeController@applicationPage')->name('application');
    Route::get('/announcement', 'HomeController@announcementPage')->name('announcement');
    Route::get('/accounts', 'HomeController@accountsPage')->name('accounts');
});


Route::resource('/students', "StudentController");

// PDF
Route::post('/pdf', 'ExportImportController@viewPDF')->name('pdf');
// Excel
Route::get('/export-excel', 'ExportImportController@exportExcel')->name('export-excel');
