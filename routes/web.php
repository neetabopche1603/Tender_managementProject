<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\UserController;
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
    return view('login');
});
Route::get('/user', function () {
    return view('user_login');
})->name('user.login');

Route::controller(HomeController::class)->group(function() {
    Route::get('dashboard','__index')->name('admin.dashboard');

});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','__index')->name('login');
    Route::post('login','__login')->name('login.post');
    Route::post('user-login','__userLogin')->name('user.login.post');
});

  // Logout Admin Route
  Route::get('logout', function () {
      if(session()->get('type') == 'admin'){
        session()->flush();
        return redirect()->route('login');
      }
    auth()->logout();
    return redirect()->route('user.login');
});

Route::controller(UserController::class)->group(function(){
Route::get('admin/user/user-register','__index')->name('user.register');
Route::get('admin/user/user-add','__userForm')->name('user.register.form');
Route::post('admin/user/user-add','__store')->name('user.register.store');
Route::get('admin/user/edit-user/{id}','__userEditForm')->name('user.edit.form');
Route::post('admin/user/user-update','__update')->name('user.update');
Route::get('admin/user/delete-user/{uid}','__deleteUser')->name('user.delete');
});

// Tender Routes 
Route::controller(TenderController::class)->group(function(){
Route::get('tender','__index')->name('tender');
Route::get('tender/add-tender','__tenderForm')->name('tender.add.form');
Route::post('store-tendor','__store')->name('store.tendor');
Route::get('delete-tender/{tid}','__deleteTender')->name('tender.delete');
});
