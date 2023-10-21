<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YearController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin'],function (){

    Route::group(['middleware'=>'guest:admin'],function () {
        Route::get('/login', [AdminLoginController::class, 'login'])->name('admins.login');
        Route::post('/check', [AdminLoginController::class, 'check'])->name('admins.check');
    });

    Route::group(['middleware'=>'auth:admin'],function (){

        Route::get('/home',function (){
            return view('admin.home');
        });
        Route::post('logout',[AdminLoginController::class,'logout'])->name('admins.logout');

        Route::group(['prefix'=>'years'],function (){
            Route::get('/',[YearController::class,'index'])->name('years.index');
            Route::post('/store',[YearController::class,'store'])->name('years.store');
            Route::put('/update/{id}',[YearController::class,'update'])->name('years.update');
            Route::delete('/{id}',[YearController::class,'delete'])->name('years.delete');

        });

        Route::group(['prefix'=>'modules'],function (){
            Route::get('/',[ModuleController::class,'index'])->name('modules.index');
            Route::get('/{id}',[ModuleController::class,'modules_by_year'])->name('modules.modules_by_year');
            Route::post('/store',[ModuleController::class,'store'])->name('modules.store');
            Route::put('/update/{id}',[ModuleController::class,'update'])->name('modules.update');
            Route::delete('/{id}',[ModuleController::class,'delete'])->name('modules.delete');

        });

        Route::group(['prefix'=>'courses'],function (){
            Route::get('/',[CourseController::class,'index'])->name('courses.index');
            Route::get('/{id}',[CourseController::class,'courses_by_module'])->name('courses.courses_by_module');
            Route::post('/store',[CourseController::class,'store'])->name('courses.store');
            Route::put('/update/{id}',[CourseController::class,'update'])->name('courses.update');
            Route::delete('/{id}',[CourseController::class,'delete'])->name('courses.delete');

        });

        Route::group(['prefix'=>'questions'],function (){
            Route::get('/',[QuestionController::class,'index'])->name('questions.index');
            Route::get('/create',[QuestionController::class,'create'])->name('questions.create');
            Route::get('/create/{id}',[QuestionController::class,'create_by_course'])->name('questions.create_by_course');
            Route::get('/{id}',[QuestionController::class,'questions_by_course'])->name('questions.questions_by_course');
            Route::post('/store',[QuestionController::class,'store'])->name('questions.store');
            Route::put('/update/{id}',[QuestionController::class,'update'])->name('questions.update');
            Route::delete('/{id}',[QuestionController::class,'delete'])->name('questions.delete');

        });

        Route::group(['prefix'=>'answers'],function (){
            Route::get('/{id}',[AnswerController::class,'index'])->name('answers.index');
            Route::post('/store',[AnswerController::class,'store'])->name('answers.store');
            Route::put('/update/{id}',[AnswerController::class,'update'])->name('answers.update');
            Route::delete('/{id}',[AnswerController::class,'delete'])->name('answers.delete');

        });

    });

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
