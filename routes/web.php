<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/vendors', [CoreController::class, 'vendors'])->name('vendors');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/referrals', [App\Http\Controllers\HomeController::class, 'referrals'])->name('referrals');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('password.confirm');
Route::get('/wallet', [App\Http\Controllers\HomeController::class, 'wallet'])->name('wallet');

Route::put('/profile_image', [UserController::class, 'uploadProfileImage'])->name('uploadProfileImage');
Route::put('/bio_data', [UserController::class, 'updateBioData'])->name('updateBioData');
Route::put('/pass_change', [UserController::class, 'updateUserPassword'])->name('updateUserPassword');
Route::post('/ref_cashout', [UserController::class, 'referralCashout'])->name('referral_cashout');
Route::post('/task_cashout', [UserController::class, 'taskCashout'])->name('task_cashout');

Route::get('/users', [AdminController::class, 'users'])->name('users')->middleware('role.admin');
Route::get('/coupons', [AdminController::class, 'coupons'])->name('coupons')->middleware('role.admin');
Route::get('/coupons/create', [AdminController::class, 'create_coupon'])->name('coupons.create')->middleware('role.admin');
Route::delete('/user', [AdminController::class, 'destroy_user'])->name('user.destroy')->middleware('role.admin');

Route::resource('debits', WithdrawalController::class)->only(['index', 'update', 'destroy']);
Route::post('/debits', [WithdrawalController::class, 'toggle'])->name('debits.toggle')->middleware('role.admin');

Route::resource('blog', App\Http\Controllers\PostController::class);
Route::post('save_blog_share', [App\Http\Controllers\PostController::class, 'save_blog_share'])->name('blog.share');

Route::get('/link_storage', function () {
  Artisan::call('storage:link');
});
