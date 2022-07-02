<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\YearController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Sdetting routes

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/settings/years', [YearController::class, 'create'])->name('years.create');
    Route::get('/years/{year}/edit', [YearController::class, 'edit'])->name('years.edit');
    Route::put('/year/{year}/update', [YearController::class, 'update'])->name('years.update');

    //Levels Routing

    Route::prefix('levels')->group(function(){
        Route::get('/', [LevelController::class, 'index'])->name('levels');
        Route::get('/create', [LevelController::class, 'create'])->name('levels.create');
        Route::get('/{level}/edit', [LevelController::class, 'edit'])->name('levels.edit');
        Route::put('/{level}/update', [LevelController::class, 'update'])->name('levels.update');
    });
    
    Route::prefix('classrooms')->group(function(){
        Route::get('/', [ClassController::class, 'index'])->name('classrooms');
        Route::get('/create', [ClassController::class, 'create'])->name('classrooms.create');
        Route::get('/{classe}/edit', [ClassController::class, 'edit'])->name('classrooms.edit');
        Route::put('/{classe}/update', [ClassController::class, 'update'])->name('classrooms.update');
    });
    
    Route::prefix('students')->group(function(){
        Route::get('/', [StudentController::class, 'index'])->name('students');
        Route::get('/create', [StudentController::class, 'create'])->name('students.create');
        Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('/{student}/update', [StudentController::class, 'update'])->name('students.update');
    });

    //Reger student in classe per year

    Route::prefix('registrations')->group(function(){
        Route::get('/', [RegistrationController::class, 'index'])->name('registrations');
        Route::get('/new', [RegistrationController::class, 'create'])->name('registrations.create');
        Route::get('/{registration}/edit', [RegistrationController::class, 'edit'])->name('registrations.edit');
    });
   
    Route::prefix('payments')->group(function(){
        Route::get('/new', [PaymentController::class, 'create'])->name('payments.create');
    });
});
