<?php


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

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Auth\ResetPassword;
use App\Http\Controllers\Auth\ChangePassword;            
            

Route::get('/', function () {return redirect('/admin/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('admin/tracks', TrackController::class);
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/admin/profile', [ProfileController::class, 'show'])->name('profile');
	Route::post('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::put('/admin/profile', [ProfileController::class, 'resetPassword'])->name('profile.resetPassword');
	Route::get('/admin/admins', [AdminController::class, 'index'])->name('admins');
	Route::post('/admin/admins', [AdminController::class, 'store'])->name('admins.store');
	Route::get('/admin/admins-create', [AdminController::class, 'create'])->name('admins.create');
	Route::get('/admin/admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
	Route::put('/admin/admins/{id}', [AdminController::class, 'update'])->name('admins.update');
	Route::delete('/admin/admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
	Route::get('/admin/users', [UserController::class, 'index'])->name('users');
	Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
	Route::get('/admin/users-create', [UserController::class, 'create'])->name('users.create');
	Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
	Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
	Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});