<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuestionController;
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



// ADMIN PANEL ROUTE
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {

        return view('admin.signin');
    })->name('admin');

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
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        /*
|--------------------------------------------------------------------------
| QUESTIONS CREATE STORE DELETE UPDATE EDIT 
|--------------------------------------------------------------------------
*/
        Route::resource('questions', QuestionController::class);

        Route::get('question/{slug}',[QuestionController::class,'index'])->name('admin.question.index');

        /*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
        Route::get('logout', [DashboardController::class, 'logout'])->name('admin.logout');
    });
});
