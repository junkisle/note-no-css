<?php

use Illuminate\Support\Facades\Route;

//================= ====================== MainControllers ===== ==============================//
use App\Http\Controllers\MainController;

// Open Index(Front) Page
Route::get('/', [MainController::class, 'index'])->name('index.open');

// Open Login Page
Route::get('/auth/login', [MainController::class, 'viewLogin'])->name('login.open');

// Login Existing Account
Route::post('/auth/login', [MainController::class, 'login'])->name('login.account');

// Open Signup Page
Route::get('/auth/signup', [MainController::class, 'viewSignup'])->name('signup.open');

// Signup new account
Route::post('/auth/signup', [MainController::class, 'signup'])->name('signup.account');

// Open Main Page
Route::get('/welcome', [MainController::class, 'viewMain'])->name('main.open');
//=============================================================================================//


//==================== =================== TaskControllers ================================ ===//
use App\Http\Controllers\TaskController;

// Open Task Main Page
Route::get('/tasks/view/{username}', [TaskController::class, 'viewTasks'])->name('tasks.open');

// View Create New Task
Route::get('/tasks/create/{username}', [TaskController::class, 'viewCreateTasks'])->name('tasks.viewcreate');

//=============================================================================================//