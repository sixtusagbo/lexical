<?php

use App\Http\Controllers\CoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [CoreController::class, 'index']);
Route::get('/contact', [CoreController::class, 'contact'])->name('contact');
Route::get('/testimonial', [CoreController::class, 'testimonial'])->name('testimonial');
Route::get('/payment', [CoreController::class, 'payment'])->name('payment');
Route::get('/faq', [CoreController::class, 'faq'])->name('faq');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/referrals', [App\Http\Controllers\HomeController::class, 'referrals'])->name('referrals');
