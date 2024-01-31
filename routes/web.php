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
use App\Http\Controllers\GerantController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\DamancomController;
use App\Http\Controllers\RegusController;
use App\Http\Controllers\CimrController;
use App\Http\Controllers\ImpotController;
use App\Http\Controllers\ContactController;








Route::get('/',[HomeController::class,'Home'])->name('home');
Route::get('/Login',[HomeController::class,'Login'])->name('Login');
Route::get('/SignUp',[HomeController::class,'SignUp'])->name('SignUp');
Route::post('/SignUpRequest',[HomeController::class,'SignUpRequest'])->name('SignUpRequest');
Route::post('/LoginRequest',[HomeController::class,'loginRequest'])->name('LoginRequest');
Route::get('/About',[HomeController::class,'About'])->name('About');
Route::get('/contact', [ContactController::class, 'index'])->name('mails.contact_mail');
Route::post('/contact/send', [ContactController::class, 'send'])->name('mails.send');

Route::group(['middleware' => 'auth'], function () {


	

	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('/register', function () {
		return view('register');
	})->name('/register');
	Route::get('admin-dashboard', function () {
		return view('admin-dashboard');
	})->name('admin-dashboard');

	Route::get('profile1', function () {
		return view('profile1');
	})->name('profile1');

    Route::get('/logout', [HomeController::class, 'logout']);
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
Route::get('/associes/show/{id}', [AssocieéController::class, 'show'])->name('associes.show');
Route::get('/associes/edit/{id}', [AssocieéController::class, 'edit'])->name('associes.edit');
Route::put('/associes/update/{id}', [AssocieéController::class, 'update'])->name('associes.update');
Route::delete('/associes/destroy/{id}', [AssocieéController::class, 'destroy'])->name('associes.destroy');
Route::post('/associes/search', [AssocieéController::class, 'search'])->name('associes.search');

//pour le gérants
Route::get('/gerants', [GerantController::class, 'index'])->name('gerants.index');
Route::get('/gerants/create', [GerantController::class, 'create'])->name('gerants.create');
Route::post('/gerants/store', [GerantController::class, 'store'])->name('gerants.store');
Route::get('/gerants/edit/{id}', [GerantController::class, 'edit'])->name('gerants.edit');
Route::get('/gerant/show/{id}', [GerantController::class, 'show'])->name('gerants.show');
Route::put('/gerants/update/{id}', [GerantController::class, 'update'])->name('gerants.update');
Route::delete('/gerants/destroy/{id}', [GerantController::class, 'destroy'])->name('gerants.destroy');
Route::post('/gerants/search', [GerantController::class, 'search'])->name('gerants.search');

// ----------------------------------------------------------
Route::get('/societes', [SocieteController::class, 'index'])->name('societes.index');
Route::get('/societes/create', [SocieteController::class, 'create'])->name('societes.create');
Route::post('/societes', [SocieteController::class, 'store'])->name('societes.store');

Route::get('/societes/edit/{id}', [SocieteController::class, 'edit'])->name('societes.edit');
Route::put('/societes/update/{id}', [SocieteController::class, 'update'])->name('societes.update');
Route::delete('/societes/destroy/{id}', [SocieteController::class, 'destroy'])->name('societes.destroy');
Route::get('/societes/show/{id}', [SocieteController::class, 'show'])->name('societes.show');
Route::get('/societes/showAss/{id}', [SocieteController::class, 'showAss'])->name('societes.showAss');
Route::get('/societes/showGer/{id}', [SocieteController::class, 'showGer'])->name('societes.showGer');

Route::get('/societes/search', [SocieteController::class, 'search'])->name('societes.search');


//damancom
Route::get('/damancoms', [DamancomController::class, 'index'])->name('damancoms.index');
Route::get('/damancoms/create', [DamancomController::class, 'create'])->name('damancoms.create');

Route::post('/damancoms', [DamancomController::class, 'store'])->name('damancoms.store');
Route::get('/damancoms/edit/{id}', [DamancomController::class, 'edit'])->name('damancoms.edit');
Route::put('/damancoms/update/{id}', [DamancomController::class, 'update'])->name('damancoms.update');
Route::delete('/damancoms/destroy/{id}', [DamancomController::class, 'destroy'])->name('damancoms.destroy');
Route::get('/damancoms/show/{id}', [DamancomController::class, 'show'])->name('damancoms.show');
Route::get('/damancoms/search', [DamancomController::class, 'search'])->name('damancoms.search');

//impots
Route::get('/impots', [ImpotController::class, 'index'])->name('impots.index');
Route::get('/impots/create', [ImpotController::class, 'create'])->name('impots.create');

Route::post('/impots', [ImpotController::class, 'store'])->name('impots.store');
Route::get('/impots/edit/{id}', [ImpotController::class, 'edit'])->name('impots.edit');
Route::put('/impots/update/{id}', [ImpotController::class, 'update'])->name('impots.update');
Route::delete('/impots/destroy/{id}', [ImpotController::class, 'destroy'])->name('impots.destroy');
Route::get('/impots/show/{id}', [ImpotController::class, 'show'])->name('impots.show');
Route::get('/impots/search', [ImpotController::class, 'search'])->name('impots.search');

//CIMR
Route::get('/cimr', [CimrController::class, 'index'])->name('cimr.index');
Route::get('/cimr/create', [CimrController::class, 'create'])->name('cimr.create');

Route::post('/cimr', [CimrController::class, 'store'])->name('cimr.store');
Route::get('/cimr/edit/{id}', [CimrController::class, 'edit'])->name('cimr.edit');
Route::put('/cimr/update/{id}', [CimrController::class, 'update'])->name('cimr.update');
Route::delete('/cimr/destroy/{id}', [CimrController::class, 'destroy'])->name('cimr.destroy');
Route::get('/cimr/show/{id}', [CimrController::class, 'show'])->name('cimr.show');
Route::get('/cimr/search', [CimrController::class, 'search'])->name('cimr.search');
//REGUS
Route::get('/regus', [RegusController::class, 'index'])->name('regus.index');
Route::get('/regus/create', [RegusController::class, 'create'])->name('regus.create');

Route::post('/regus', [RegusController::class, 'store'])->name('regus.store');
Route::get('/regus/edit/{id}', [RegusController::class, 'edit'])->name('regus.edit');
Route::put('/regus/update/{id}', [RegusController::class, 'update'])->name('regus.update');
Route::delete('/regus/destroy/{id}', [RegusController::class, 'destroy'])->name('regus.destroy');
Route::get('/regus/show/{id}', [RegusController::class, 'show'])->name('regus.show');
Route::get('/regus/search', [RegusController::class, 'search'])->name('regus.search');