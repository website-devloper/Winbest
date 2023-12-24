<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssocieéController;
use App\Http\Controllers\GerantController
;
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


Route::group(['middleware' => 'auth'], function () {


	
    Route::get('/', [HomeController::class, 'home']);

	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('/register', function () {
		return view('register');
	})->name('/register');
	Route::get('admin-dashboard', function () {
		return view('admin-dashboard');
	})->name('admin-dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('profile1', function () {
		return view('profile1');
	})->name('profile1');


	Route::get('test', function () {
		return view('test');
	})->name('test');
	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');
	Route::get('Users', function () {
		return view('laravel-examples/Users');
	})->name('Users');

	Route::get('Gérants', function () {
		return view('laravel-examples/Gérants');
	})->name('Gérants');
	Route::get('Associéte', function () {
		return view('laravel-examples/Associéte');
	})->name('Associéte');
	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('session/login-session');
	})->name('sign-up');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

//pour les users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/create', [UserController::class, 'edit'])->name('users.edit');
//pour les associes
Route::get('/associes', [AssocieéController::class, 'index'])->name('associes.index');
Route::get('/associes/create', [AssocieéController::class, 'create'])->name('associes.create');
Route::post('/associes', [AssocieéController::class, 'store'])->name('associes.store');
Route::get('/associes/edit/{id}', [AssocieéController::class, 'edit'])->name('associes.edit');
Route::put('/associes/update/{id}', [AssocieéController::class, 'update'])->name('associes.update');
Route::delete('/associes/destroy/{id}', [AssocieéController::class, 'destroy'])->name('associes.destroy');
//pour le gérants
Route::get('/gerants', [GerantController::class, 'index'])->name('gerants.index');
Route::get('/gerants/create', [GerantController::class, 'create'])->name('gerants.create');
Route::post('/gerants', [GerantController::class, 'store'])->name('gerants.store');
Route::post('/gerants', [GerantController::class, 'store1'])->name('gerants.store1');

Route::get('/gerants/edit/{id}', [GerantController::class, 'edit'])->name('gerants.edit');
Route::put('/gerants/update/{id}', [GerantController::class, 'update'])->name('gerants.update');
Route::delete('/gerants/destroy/{id}', [GerantController::class, 'destroy'])->name('gerants.destroy');
