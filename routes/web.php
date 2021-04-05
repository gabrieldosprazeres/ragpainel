<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\MyAccount;
use App\Http\Controllers\User\MyChars;
use App\Http\Controllers\Admin\LogsController;

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

Route::get('/',[IndexController::class, 'index'])->name('index');

Route::get('/register',[RegisteredUserController::class, 'index'])->name('user.index.register');
Route::post('/register',[RegisteredUserController::class, 'register'])->name('user.register');

Route::get('/login',[AuthenticatedSessionController::class, 'index'])->name('user.index.login');
Route::post('/login',[AuthenticatedSessionController::class, 'authenticate'])->name('user.login');
Route::get('/logout',[AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('user.logout');

Route::get('/myaccount',[MyAccount::class, 'index'])->middleware('auth')->name('user.myaccount');
Route::post('/myaccount',[MyAccount::class, 'update'])->middleware('auth')->name('user.myaccount.update');
Route::post('/myaccount/upload',[MyAccount::class, 'uploadimg'])->middleware('auth')->name('user.myaccount.upload');
Route::get('/mychars',[MyChars::class, 'index'])->middleware('auth')->name('user.mychars');
Route::post('/mychars/resetposition',[MyChars::class, 'resetPosition'])->middleware('auth')->name('user.resetposition');
Route::post('/mychars/resetstyle',[MyChars::class, 'resetStyle'])->middleware('auth')->name('user.resetstyle');

Route::get('/admin/logs',[LogsController::class, 'index'])->middleware('auth', 'admin')->name('admin.logs');
