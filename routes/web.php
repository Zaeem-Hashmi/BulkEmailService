<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmialListController;
use App\Models\EmailList;

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
  
  
Auth::routes();
  
Route::get('/', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
Route::group(['middleware' => ['auth']], function() {
    Route::get('email',[EmailController::class,'index'])->name('email.index');
    Route::get('email/create',[EmailController::class,'create'])->name('email.create');
   Route::delete('/email/destroy/{id}',[EmailController::class,'delete'])->name('email.destroy');
   Route::post('/email/store/',[EmailController::class,'save'])->name('email.store');
   Route::get('/email/send/',[EmailController::class,'send'])->name('email.send');
   Route::post('/email/send/',[EmailController::class,'sendEmail'])->name('email.send');
});
Route::group(['middleware' => ['auth']], function() {
   Route::get('/EmailList/create',[EmialListController::class,'index'])->name('emialList.create');
   Route::get('/EmailList/add',[EmialListController::class,'add'])->name('emialList.add');
   Route::post('/EmailList/store',[EmialListController::class,'store'])->name('emialList.store');
});
Route::group(['middleware' => ['auth']], function() {
    Route::get('/settings/edit',[EmailController::class,'settings'])->name('settings.edit');
    Route::post('/settings/store',[EmailController::class,'settingstore'])->name('settings.store');
 });