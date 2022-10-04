<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminViewController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAnnouncementController;
use App\Http\Controllers\User\UserViewController;

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

// Route::group(['prefix'=>'admin'], function(){
//     Route::get('/dashboard', 'HomeController@index')->name('dashboard');
//     Route::get('/application', 'HomeController@applicationPage')->name('application');
//     Route::get('/announcement', 'HomeController@announcementPage')->name('announcement');
//     Route::get('/accounts', 'HomeController@accountsPage')->name('accounts');
// });


// Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
//     Route::get('/dashboard', 'HomeController@index')->name('dashboard');
//     Route::get('/application', 'HomeController@applicationPage')->name('application');
//     Route::get('/announcement', 'HomeController@announcementPage')->name('announcement');
//     Route::get('/accounts', 'HomeController@accountsPage')->name('accounts');
// });


// Route::get('/student/announcement', 'StudentAccessController@announcementPage');

// Route::get('/student/profile', 'StudentAccessController@profilePage');
// Route::post('/student/profile', 'StudentAccessController@profilePage')->name('student.profile');
// Route::put('/student/profile/{student}', 'StudentAccessController@storeImage')->name('update.profile');

// Route::resource('/students', "StudentController");
// Route::resource('/admin', "AdminController");
// Route::resource('/', "StudentProfileController");
// Route::resource('/announcement', "AnnouncementController");


// 
// Route::get('/admin_access', 'AdminViewController@index')->name('layouts.admin');
// Route::get('/admin_access',[AdminViewController::class, 'index'])->name('adminIndex');


Route::prefix('admin_access')->middleware(['adminAccess'])->group(function(){
    Route::get('/',                 [AdminViewController::class, 'chartsView'])->name('adminCharts');
    Route::get('/student',          [AdminViewController::class, 'studentsView'])->name('AdminStudent');
    Route::get('/announcement',     [AdminViewController::class, 'announcementView'])->name('AdminAnnouncement');
    Route::get('/account',          [AdminViewController::class, 'accountView'])->name('AdminAccount');

    // STUDENT STORE.UPDATE.DELETE
    Route::post('/student',         [AdminStudentController::class, 'store'])->name('store.student');
    Route::put('/student/{id}',     [AdminStudentController::class, 'update'])->name('update.student');
    Route::get('/student/{id}',     [AdminStudentController::class, 'destroy'])->name('detroy.student');

    // ADMIN STORE.UPDATE.DELETE
    Route::post('/account',         [AdminController::class, 'store'])->name('store.admin');
    Route::put('/account/{id}',     [AdminController::class, 'update'])->name('update.admin');
    Route::get('/account/{id}',     [AdminController::class, 'destroy'])->name('detroy.admin');

    // ANNOUNCEMENT STORE.UPDATE.DELETE
    Route::post('/announcement',    [AdminAnnouncementController::class, 'store'])->name('store.announcement');
    Route::put('/announcement/{id}',    [AdminAnnouncementController::class, 'update'])->name('update.announcement');
    Route::get('/announcement/{id}', [AdminAnnouncementController::class, 'destroy'])->name('destroy.announcement');

    // PDF
    Route::post('/pdf', 'ExportImportController@viewPDF')->name('pdf');
    // Excel Export
    Route::get('/export-excel', 'ExportImportController@exportExcel')->name('export-excel');
    // Excel Import
    Route::get('/import', 'ExportImportController@importView')->name('importView');
    Route::post('/import', 'ExportImportController@importFile')->name('import.studentExcel');
});


Route::prefix('student_access')->middleware(['studentAccess'])->group(function(){
    Route::get('/', [UserViewController::class, 'announcementView'])->name('userAnnouncement');
    Route::get('/profile', [UserViewController::class, 'profileView'])->name('userProfile');
    Route::put('/profile/{id}', [UserViewController::class, 'profileImage'])->name('changeProfileImage');
});


Route::get('/verifyEmail/{token}',[App\Http\Controllers\Admin\AdminStudentController::class,'emailverification']);