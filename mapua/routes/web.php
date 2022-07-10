<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\UpdateUser;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
   return Inertia::render('Welcome', [
       'canLogin' => Route::has('login'),
       'canRegister' => Route::has('register'),
       'laravelVersion' => Application::VERSION,
       'phpVersion' => PHP_VERSION,
   ]);
});

Route::middleware(['auth:sanctum'])->get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::prefix('Admin')->middleware(['auth:sanctum','Admin'])->group(function(){

      Route::get('/users',[AdminController::class, 'users'])->name('users');
      Route::get('/user/register',[AdminController::class,'userRegister'])->name('registerUser');
      Route::get('/user/{id}',[AdminController::class,'userProfile'])->name('userProfile');
      Route::delete('/user/delete',[AdminController::class,'userDelete'])->name('userDelete');
      Route::post('/user/register',[AdminController::class, 'userRegisterSubmit'])->name('registerUserSubmit');
      Route::post('user/update/submit',[AdminController::class,'userUpdate'])->name('userUpdate');
      Route::post('import',[AdminController::class, 'userUpload'])->name('import');

});
Route::prefix('Users')->middleware(['auth:sanctum','Users'])->group(function(){
    Route::get('User/Loan',[LoansController::class,'index'])->name('userLoan');
});

