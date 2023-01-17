<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CabinController;
use App\Http\Controllers\ScheduleController;
use App\Models\Appointment;

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

Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', function () {
    return view('homepage');
})->name('homepage.page');

Route::get('register', function(){
    return view('auth.register');
})->name('register');

Route::get('login', function(){
    return view('auth.login');
})->name('login');


Route::post('create', [UserController::class, ('createUser')])->name('register.custom');
Route::post('login-user', [UserController::class, ('customLogin')])->name('login.custom');
Route::get('logout-user', [UserController::class, ('logout')])->name('logout.user');
Route::post('resetpassword', [UserController::class, ('sendResetLink')])->name('forgot-password');

// Route::get('patient-page', [UserController::class, ('patient')])->middleware(['useraccess:patient']);



Route::group(['middleware' => ['auth', 'user:patient']], function () {

    Route::controller(PatientController::class)->group(function(){
        Route::get('/patient-dashboard', 'index')->name('patient.page');
        Route::get('/change-patient-password', 'changePatientPassword')->name('change.patient.password');
        Route::post('/change-patient-pass', 'updatePatientPassword')->name('update.patient.password');
        Route::get('/bookappointment', 'bookAppointment')->name('book.appointment');
    });

    Route::resource('patients', PatientController::class);
    Route::resource('appointments', AppointmentController::class);
    
});

Route::group(['middleware' => ['auth', 'user:staff']], function () {
    
    Route::controller(StaffController::class)->group(function(){
        Route::get('/staff-dashboard', 'index')->name('staff.page');
        Route::get('/change-password', 'changePassword')->name('change.password');
        Route::post('/changepass', 'updatePassword')->name('update.password');
    });

    Route::post('/appointment/check', [AppointmentController::class, ('check')])->name('appointment.check');
    Route::get('/showSchedule', [AppointmentController::class, 'showSchedule'])->name('show.setSchedule');

    Route::resource('staff', StaffController::class);
    Route::resource('doctor', DoctorController::class);
    Route::resource('patient', PatientController::class);
    Route::resource('appointment', AppointmentController::class);
    Route::resource('session', SessionController::class);
    Route::resource('cabin', CabinController::class);

    Route::get('changeStatus', [TestController::class, 'changeStatus']);

    // Route::post('store/{$id}', [SessionController::class, 'store'])->name('session.store');

});

Route::group(['middleware' => ['auth', 'user:doctor']], function () {
    
    Route::get('/doctor-page', [UserController::class, ('doctor')])->name('doctor.page');
});


// Forgot Password


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

});


// Route::get('forgetpass', [ForgotPasswordController::class, ('showForgetPasswordForm')])->name('forget.password.post');


// Route::get('/patient', function(){
//     return view('patient');
// })->name('patient.page');

// Route::get('/app', function(){
//     return view('staff.appointments.index');
// });

// Route::get('/addapp', function(){
//     return view('staff.appointments.addappointments');
// });


// Route::get('/settime', function(){
//     return view('staff.appointments.appointment_time');
// });

Route::resource('schedule', ScheduleController::class);
Route::get('/setschedule', [ScheduleController::class, 'showSetSchedule'])->name('set.schedule');