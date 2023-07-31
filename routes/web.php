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



use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseQuizController;
use App\Http\Controllers\Admin\CourseVideoController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuizQuestionController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\TrackCourseController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\ALLCoursesController;
use App\Http\Controllers\Auth\ResetPassword;
use App\Http\Controllers\Auth\ChangePassword;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController as ControllersCourseController;
use App\Http\Controllers\MyCoursesController;
use App\Http\Controllers\ProfileController as ControllersProfileController;
use App\Http\Controllers\QuizController as ControllersQuizController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrackController as ControllersTrackController;
use Illuminate\Support\Facades\Mail;




	Route::get('/', [HomeController::class, 'index'])->name('home');
	Route::get('/search', [SearchController::class, 'index']);
	Route::get('/contact', [ContactController::class, 'index']);
	Route::post('/contact', [ContactController::class, 'contact']);
	Route::get('/allcourses', [ALLCoursesController::class, 'index']);
	Route::get('/mycourses', [MyCoursesController::class, 'index']);
	Route::post('/courses/{slug}',[ControllersCourseController::class, 'enroll']);
	Route::get('/tracks/{name}', [ControllersTrackController::class, 'index']);
	Route::get('/courses/{slug}',[ControllersCourseController::class, 'index']);
	Route::get('/profile',[ControllersProfileController::class, 'index']);
	Route::post('/profile',[ControllersProfileController::class, 'update']);
	Route::get('/courses/{slug}/quizzes/{name}',[ControllersQuizController::class, 'index']);
	Route::post('/courses/{slug}/quizzes/{name}',[ControllersQuizController::class, 'submit']);
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::group(['middleware' => 'auth'], function () {
	
	Route::resource('admin/tracks', TrackController::class);
	Route::resource('admin/tracks.courses', TrackCourseController::class);
	Route::resource('admin/courses', CourseController::class);
	Route::resource('admin/courses.videos', CourseVideoController::class);
	Route::resource('admin/courses.quizzes', CourseQuizController::class);
	Route::resource('admin/videos', VideoController::class);
	
	Route::resource('admin/quizzes', QuizController::class);
	Route::resource('admin/quizzes.questions', QuizQuestionController::class);
	Route::resource('admin/questions', QuestionController::class)->except(['show']);
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/admin/profile', [ProfileController::class, 'show'])->name('profile');
	Route::post('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::put('/admin/profile', [ProfileController::class, 'resetPassword'])->name('profile.resetPassword');
	Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admins.dashboard');
	Route::get('/admin/admins', [AdminController::class, 'admins'])->name('admins');
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
