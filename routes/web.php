<?php

use App\Http\Controllers\TaskController;
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
// All Tasks
Route::get('/', [TaskController::class, 'index']);

//Show Create Form
Route::get('/tasks/create', [TaskController::class, 'create']);

//Store Task Data
Route::post('/tasks', [TaskController::class, 'store']);

//Show Edit Form
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);

// Update Task
Route::put('/tasks/{task}', [TaskController::class, 'update']);

// Delete Task
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

// Single Task
Route::get('/tasks/{task}', [TaskController::class, 'show']);
