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
// Submit the new task created
Route::post('/tasks/submit/{username}', [TaskController::class, 'submitTasks'])->name('tasks.submit');

// Change task status
Route::put('/tasks/view/update/{task}', [TaskController::class, 'updateTasks'])->name('tasks.update');

// submit edit change
Route::put('/tasks/edit/submit/{task}', [TaskController::class, 'editTasks'])->name('tasks.edit');

// delete task
Route::delete('/tasks/destroy/{task}', [TaskController::class, 'destroyTasks'])->name('tasks.destroy');

//=============================================================================================//


//==================== =================== NoteControllers ================================ ===//
use App\Http\Controllers\NoteController;

// Open Notes Main Page
Route::get('/notes/view/{username}', [NoteController::class, 'viewNotes'])->name('notes.open');

// Open create new note page
Route::get('/notes/create/{username}', [NoteController::class, 'viewCreateNotes'])->name('notes.create');

// Submit a new note
Route::post('/notes/submit/{username}', [NoteController::class, 'submitNotes'])->name('notes.submit');

// View edit note
Route::get('/notes/edit/{title}', [NoteController::class, 'viewEditNotes'])->name('notes.editView');
// submit edit note
Route::put('/notes/edit/submit/{note}', [NoteController::class, 'editNotes'])->name('notes.edit');

// Delete note
Route::delete('/notes/delete/{note}', [NoteController::class, 'deleteNotes'])->name('notes.delete');