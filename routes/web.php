<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CallerController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
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
})->name('welcome');

Route::middleware([User::class])->group(function (){
    Route::get('/account/{group_id}', [TeacherController::class, 'accountView'])->name('account');
    Route::post('/createSchedule/{group_id}', [TeacherController::class, 'createSchedule']);
    Route::get('/updLessons/{group_id}', [LessonController::class, 'updLessons'])->name('updlessons');
    Route::post('/updLessons/{group_id}', [LessonController::class, 'updLessonsPost']);
});

Route::middleware([Admin::class])->group(function (){
    Route::get('/admin', [AdminController::class, 'adminView'])->name('admin');

    Route::get('/info', [AdminController::class, 'adminInfoView'])->name('adminInfo');
    Route::post('/infoPost', [AdminController::class, 'adminInfoPost']);

    Route::post('/addUser', [AdminController::class, 'addUser']);
    Route::post('/addSubject', [AdminController::class, 'addSubject']);
    Route::post('/addCabinet', [AdminController::class, 'addCabinet']);
    Route::post('/addGroup', [AdminController::class, 'addGroup']);

    Route::get('/deleteUser{user_id}', [AdminController::class, 'deleteUserView']);
    Route::post('/deleteUser{user_id}', [AdminController::class, 'deleteUserPost']);
    Route::get('/deleteCabinet{cabinet_id}', [AdminController::class, 'deleteCabinet']);
    Route::get('/deleteLessons/{date}/{group_id}', [LessonController::class, 'delLessons']);
    Route::get('/deleteSubject{subject_id}', [AdminController::class, 'delSubject']);
    Route::get('/deleteGroup{group_id}', [AdminController::class, 'delGroup']);
});

Route::get('/auth', [UserController::class, 'authView'])->name('auth');
Route::post('/auth', [UserController::class, 'authPost']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/main/{date}/{group_id}', [UserController::class, 'mainView'])->name('main');
Route::post('/main', [UserController::class, 'mainPost']);

Route::get('/callers', [CallerController::class, 'callersView'])->name('callers');
Route::post('/callers', [CallerController::class, 'callersPost']);

Route::get('/listTeachers', [TeacherController::class, 'listView'])->name('list');
