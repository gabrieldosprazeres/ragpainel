<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\MyAccount;
use App\Http\Controllers\User\MyChars;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\Admin\ManagerCashController;
use App\Http\Controllers\Admin\ManagerVipController;
use App\Http\Controllers\Admin\ManagerStaffController;
use App\Http\Controllers\Admin\ManagerBanController;

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

// Página inicial
Route::get('/',[IndexController::class, 'index'])->name('index');

// Usuário.
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

// Administrador.

// Logs
Route::get('/admin/logs',[LogsController::class, 'index'])->middleware('auth', 'admin')->name('admin.logs');

// Gerenciar Cash
Route::get('/admin/managercash',[ManagerCashController::class, 'index'])->middleware('auth', 'admin')->name('admin.managercash');
Route::post('/admin/managercash/add',[ManagerCashController::class, 'add'])->middleware('auth', 'admin')->name('admin.managercash.add');
Route::post('/admin/managercash/remove',[ManagerCashController::class, 'remove'])->middleware('auth', 'admin')->name('admin.managercash.remove');
Route::post('/admin/managercash',[ManagerCashController::class, 'find'])->middleware('auth', 'admin')->name('admin.managercash.find');

// Gerenciar VIP
Route::get('/admin/managervip',[ManagerVipController::class, 'index'])->middleware('auth', 'admin')->name('admin.managervip');
Route::post('/admin/managervip/add',[ManagerVipController::class, 'add'])->middleware('auth', 'admin')->name('admin.managervip.add');
Route::post('/admin/managervip/remove',[ManagerVipController::class, 'remove'])->middleware('auth', 'admin')->name('admin.managervip.remove');
Route::post('/admin/managervip',[ManagerVipController::class, 'find'])->middleware('auth', 'admin')->name('admin.managervip.find');

// Gerenciar Equipe
Route::get('/admin/managerstaff',[ManagerStaffController::class, 'index'])->middleware('auth', 'admin')->name('admin.managerstaff');
Route::post('/admin/managerstaff/add',[ManagerStaffController::class, 'add'])->middleware('auth', 'admin')->name('admin.managerstaff.add');
Route::post('/admin/managerstaff/remove',[ManagerStaffController::class, 'remove'])->middleware('auth', 'admin')->name('admin.managerstaff.remove');
Route::post('/admin/managerstaff',[ManagerStaffController::class, 'find'])->middleware('auth', 'admin')->name('admin.managerstaff.find');

// Gerenciar Punições
Route::get('/admin/managerban',[ManagerBanController::class, 'index'])->middleware('auth', 'admin')->name('admin.managerban');
Route::post('/admin/managerban/add',[ManagerBanController::class, 'add'])->middleware('auth', 'admin')->name('admin.managerban.add');
Route::post('/admin/managerban/remove',[ManagerBanController::class, 'remove'])->middleware('auth', 'admin')->name('admin.managerban.remove');
Route::post('/admin/managerban',[ManagerBanController::class, 'find'])->middleware('auth', 'admin')->name('admin.managerban.find');
