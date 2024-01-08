<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientlistController;
use App\Http\Controllers\TreatmentController;


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

Route::get('/', 'App\Http\Controllers\FrontController@index');

Route::get('/new-appointment/{dentistId}/{date}','App\Http\Controllers\FrontController@show')->name('create.appointment');

Route::get('/dashboard','App\Http\Controllers\DashboardController@index');


Route::group(['middleware'=>['auth','patient']],function(){

    Route::post('/make/appointment', 'App\Http\Controllers\FrontController@store')->name('booking.appointment');


    Route::get('/my-appointment','App\Http\Controllers\FrontController@mybookings')->name('my.appointment')->middleware('auth');

    //profile patient
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::patch('/profile', [ProfileController::class, 'store'])->name('profile.store');

    Route::get('/my-treatment','App\Http\Controllers\FrontController@myTreatment')->name('my.treatment');
       
});


Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route can be assist by admin middleware
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('dentist', DentistController::class);
    Route::get('/patients', [PatientlistController::class, 'index'])->name('patient');
    Route::get('/patients/all', [PatientlistController::class, 'allAppointment'])->name('all.appointments');
    Route::get('/status/update/{id}', [PatientlistController::class, 'toggleStatus'])->name('update.status');
});

//only dentist 
Route::group(['middleware'=>['auth','dentist']],function(){
    Route::resource('appointment', AppointmentController::class);
    Route::post('/appointment/check', [AppointmentController::class, 'check'])->name('appointment.check');
    Route::post('/appointment/update', [AppointmentController::class, 'updateSlot'])->name('appointment.update');
    Route::get('/today-patients', 'App\Http\Controllers\TreatmentController@index')->name('today.patients');
    Route::post('/treatment', [TreatmentController::class, 'store'])->name('treatment');
    Route::get('/treatment/{userId}/{date}', [TreatmentController::class, 'show'])->name('treatment.show');
    Route::get('/list-patients-treatment', [TreatmentController::class, 'listOfTreatments'])->name('treatment.list');

});