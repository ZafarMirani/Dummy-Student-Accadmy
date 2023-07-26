<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\Student\DataController;
use App\Http\Controllers\Student\Search;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
    return view('Admin.Dashboard.admin_dashboard');
});

Route::view('dashboard', 'Admin.Dashboard.admin_dashboard');
Route::view('layouts', 'Admin.Layouts.layouts');
// Route::view('students', 'Admin.Students.students');
Route::view('student-fees', 'Admin.Fees.student_fees');
Route::view('add-student', 'Admin.Students.add_students');
Route::view('emails','emails.myTestMail');
Route::view('pay-fees','Admin.Fees.pay_fees');




Route::post('create-student',[StudentController::class, 'createStudent']);
Route::get('students',[StudentController::class, 'viewStudents']);
Route::get('delete/{id}',[StudentController::class, 'deleteStudent']);
Route::get('edit-student/{id}',[StudentController::class, 'edit']);
Route::post('update-student/{id}',[StudentController::class, 'updateStudent']);

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send-email');
Route::post('sendSMS', [EmailController::class, 'index'])->name('sendSMS');
  
Route::get('pay-fees',[Search::class, 'search' ]);

Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

// Route::get('index',[CheckoutController::class, 'index1']);

Route::controller(CheckoutController::class)->group(function(){
    Route::get('/checkout', 'index');
    Route::post('/checkout', 'DoCheckout');
    Route::post('/paymentStatus', 'paymentStatus');
});

