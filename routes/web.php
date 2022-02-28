<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Front\SurveyController;
use App\Models\State;
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

// Route::get('/', function () {
//     return view('admin.signin');
// });



/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/
Route::post('login', [AdminController::class, 'login'])->name('admin.login');

// FRONT PANEL ROUTE

Route::group(['prefix'  => 'front'],function(){
    Route::controller(SurveyController::class)->group(function(){    
    Route::post('save-survey-uniqueId-by-creator','saveSurveyUniqueIdByCreator')->name('front.save-survey-uniqueId-by-creator');
    Route::post('save-survey-by-creator','saveSurveyByCreator')->name('front.save-survey-uniqueId-by-creator');
});
});

// ADMIN PANEL ROUTE
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {

        return view('admin.signin');
    })->name('admin');

    Route::controller(StateController::class)->group(function(){
        Route::get('states/index','index')->name('admin.states.index');
        Route::get('states/create','create')->name('admin.states.create');
        Route::post('states/store','store')->name('admin.states.store');
        Route::get('states/edit/{id}','edit')->name('admin.states.edit');
        Route::PATCH('states/update/{id}','update')->name('admin.states.update');
        Route::delete('states/destroy{id}','destroy')->name('admin.states.destroy');
    });

    /*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/
    // Route::post('login', [AdminController::class, 'login'])->name('admin.login');
    /*
|--------------------------------------------------------------------------
| ADMIN AUTH MIDDLEWARE
|--------------------------------------------------------------------------
*/
    Route::group(['middleware' => 'admin'], function () {
        /*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
    Route::controller(DashboardController::class)->group(function () {     
        Route::get('dashboard','index')->name('admin.dashboard');
        Route::get('logout','logout')->name('admin.logout');
    });
        /*
|--------------------------------------------------------------------------
| QUESTIONS CREATE STORE DELETE UPDATE EDIT 
|--------------------------------------------------------------------------
*/
        Route::resource('questions', QuestionController::class);
        // Route::resource('questionss', QuestionController::class);

        Route::controller(QuestionController::class)->group(function () {            
            Route::get('question/{slug}','index')->name('admin.question.index');         
        });
        // Route::get('question/{slug}',[QuestionController::class,'index'])->name('admin.question.index');
        /*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
        Route::get('logout', [DashboardController::class, 'logout'])->name('admin.logout');
    });
});