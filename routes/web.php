<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Jobs\Job;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/job/create', [JobController::class, 'create'])->name('job.create')->can('create', Job::class);
    Route::post('/job', [JobController::class, 'store'])->name('job.store')->can('create', Job::class);
    Route::get('/job/{job}/edit', [JobController::class, 'edit'])->name('job.edit')->can('edit', 'job');
    Route::patch('/job/{job}', [JobController::class, 'update'])->name('job.update')->can('edit', 'job');
    Route::delete('/job/{job}', [JobController::class, 'destroy'])->name('job.delete')->can('edit', 'job');
});

Route::get('/', [JobController::class, 'index'])->name('job.index');
Route::get('/job/{job}', [JobController::class, 'show'])->name('job.show');


Route::get('/search', SearchController::class)->name('search');
Route::get('/tag/{tag:title}', TagController::class)->name('tag'); // /tag/front-end
Route::get('/filter', FilterController::class)->name('filter');
Route::get('/employer/{employer:title}', CompanyController::class)->name('employer');


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy']);

    Route::get('/profile', [UserController::class, 'show'])->middleware('verified');
    Route::get('/profile/edit', [UserController::class, 'edit'])->middleware('verified');
    Route::post('/profile/edit', [UserController::class, 'update'])->middleware('verified');
});


Route::get('/email/verify', [RegisterController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [RegisterController::class, 'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/forgot-password', [PasswordController::class, 'request'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [PasswordController::class, 'email'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [PasswordController::class, 'reset'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'update'])->middleware('guest')->name('password.update');


Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});
