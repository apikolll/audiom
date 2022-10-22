<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('homepage');
})->name('homepage');

// Route::get('test', function(){
//     return view('test');
// });

Route::get('register', function(){
    return view('auth.register');
})->name('register');

Route::get('login', function(){
    return view('auth.login');
})->name('login');

Route::post('create', [UserController::class, ('createUser')])->name('register.custom');
Route::post('login-user', [UserController::class, ('customLogin')])->name('login.custom');
Route::get('logout-user', [UserController::class, ('logout')])->name('logout.user');

// Route::get('patient-page', [UserController::class, ('patient')])->middleware(['useraccess:patient']);

Route::group(['middleware' => ['auth', 'user:patient']], function () {
    Route::get('/patient-page', [UserController::class, ('patient')])->name('patient.page');
    Route::get('/profile-page', [UserController::class, ('userProfile')])->name('patient.profile');
});

Route::group(['middleware' => ['auth', 'user:staff']], function () {
    Route::get('/staff-page', [UserController::class, ('staff')])->name('staff.page');
});

Route::group(['middleware' => ['auth', 'user:doctor']], function () {
    Route::get('/doctor-page', [UserController::class, ('doctor')])->name('doctor.page');
});


// Route::get('/patient', function(){
//     return view('patient');
// })->name('patient.page');

