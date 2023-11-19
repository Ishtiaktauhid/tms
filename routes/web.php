<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthenticationController as auth;
use App\Http\Controllers\Backend\UserController as user;
use App\Http\Controllers\Backend\DashboardController as dashboard;
use App\Http\Controllers\Backend\ReservationController as reservation;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/signup', [auth::class, 'signUpForm'])->name('signup');
Route::post('/signup', [auth::class, 'signUpStore'])->name('signup.store');
Route::get('/signin', [auth::class, 'signInForm'])->name('signin');
Route::post('/signin', [auth::class, 'signInCheck'])->name('signin.check');
Route::get('/logout', [auth::class, 'signOut'])->name('logOut');

Route::middleware(['checkrole'])->group(function () {
    Route::get('/dashboard', [dashboard::class,'index'])->name('dashboard');
    Route::resource('/user', user::class);
    Route::resource('/reservation', reservation::class);
   
});

Route::get('/', function () {
    return view('frontend.home');
});
