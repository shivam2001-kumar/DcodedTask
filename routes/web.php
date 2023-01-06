<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\blogController;

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


Route::get('logout', function () {
    Auth::logout();
    return view('welcome');
});

Route::post('/regdata',[userController::class,'userdata']);
Route::view('login', 'login');

Route::post('/logincode',[userController::class,'logincode']);
Route::get('userdashboard',[userController::class,'userdashboard'])->name('userDashboard');

// admin

Route::get('userlist',[adminController::class,'userlist'])->name('userlist');
Route::get('userview',[adminController::class,'userview'])->name('userview');
Route::get('allblog',[adminController::class,'allblog'])->name('allblog');
Route::resource('blog',blogController::class);

Route::get('userstatus/{id}',[adminController::class,'userstatus']);
