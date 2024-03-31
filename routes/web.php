<?php

use App\Http\Controllers\pagesController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [userController::class, 'login'])->name('login');
Route::post('/', [userController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/registration', [userController::class, 'registration'])->name('registration');
Route::post('/registration', [userController::class, 'registrationSubmit'])->name('registrationSubmit');
Route::get('/index', [pagesController::class, 'home'])->name('home')->middleware('auth.user');
Route::get('/admin/index', [pagesController::class, 'admin'])->name('admin.home')->middleware('auth.user');
Route::get('/admin/user/approve/{id}', [pagesController::class, 'userApprove'])->name('admin.user.approve')->middleware('auth.user');
Route::get('/admin/user/decline/{id}', [pagesController::class, 'userDecline'])->name('admin.user.decline')->middleware('auth.user');
Route::get('/logout', [userController::class, 'logout'])->name('logout');
