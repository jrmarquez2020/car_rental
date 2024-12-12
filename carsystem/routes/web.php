<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Auth Routes
Auth::routes();

// Custom Login and Register Routes (Optional if you want customization)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Welcome Blade
Route::get('/', function () {
    return view('welcome');
})->name('home');

// User Views
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/feedbacks', [FeedbackController::class, 'index']);
Route::post('/feedbacks', [FeedbackController::class, 'store']);
Route::post('/payments', [PaymentController::class, 'store']);

// Admin Routes (Protected by 'auth' and 'admin' middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/admin/cars', CarController::class);
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/bookings', BookingController::class);
    Route::get('/admin/feedbacks', [FeedbackController::class, 'adminIndex'])->name('admin.feedbacks.index');
    Route::delete('/admin/feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('admin.feedbacks.destroy');
});

// Static Pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// Feedback and Booking Routes
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

// Home Route (Post Login Redirect)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
