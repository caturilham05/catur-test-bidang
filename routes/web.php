<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/soalno1', [TaskController::class, 'taskOne'])->name('task_one');
Route::get('/soalno2a', [TaskController::class, 'taskTwoA'])->name('task_two_a');
Route::get('/soalno2b', [TaskController::class, 'taskTwoB'])->name('task_two_b');
Route::get('/soalno2c', [TaskController::class, 'taskTwoC'])->name('task_two_c');
Route::get('/soalno3', [TaskController::class, 'taskThree'])->name('task_three');
Route::get('/soalno4', [TaskController::class, 'taskFour'])->name('task_four');
Route::get('/soalno6a', [TaskController::class, 'taskSixA'])->name('task_six_a');
Route::get('/soalno6b', [TaskController::class, 'taskSixB'])->name('task_six_b');
Route::get('/soalno7', [TaskController::class, 'taskSeven'])->name('task_seven');
