<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthController;
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

// what is ->name ? still don't understand aft explanation
Route::any('/register', [AuthController::class, 'register'])->name('register');
Route::any('/login', [AuthController::class, 'login'])->name('login');
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
//Route::get('/companies', [CompanyController::class, 'index']);
//Route::any('/company/edit/{id}', [CompanyController::class, 'edit'])
//    ->middleware('signed2')
//    ->middleware(\App\Http\Middleware\SignedRouteValidation::class)
//    ->middleware('signed')
//    ->name('company.edit');
Route::middleware(['auth'])->group(function (){
    Route::get('/companies', [CompanyController::class], 'index');
    Route::any('/company/edit/{id}', [CompanyController::class, 'edit'])
        ->middleware('signed2')
        ->name('company.edit');
});

