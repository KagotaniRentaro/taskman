<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskmanController;

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

Route::get('/test', [TaskmanController::class, 'test']);

Route::get('/', function () {
    return view('taskman.login');
});

Route::get('/login', function () {
    return view('taskman.login');
});

Route::get('/signup', function () {
    return view('taskman.signup');
});

Route::post('/signup_confirm', [TaskmanController::class, 'signup_confirm']);
Route::get('/signup_confirm', function () {
    return view('taskman.login');
});

Route::post('/signup_complete', [TaskmanController::class, 'signup_complete']);
Route::get('/signup_complete', function () {
    return view('taskman.login');
});

Route::get('/mypage', [TaskmanController::class, 'get_mypage']);
Route::post('/mypage', [TaskmanController::class, 'post_mypage']);

Route::get('/logout', [TaskmanController::class, 'logout']);

Route::get('/todo', [TaskmanController::class, 'get_todo']);
Route::post('/todo', [TaskmanController::class, 'post_todo']);

Route::post('/todo_complete', [TaskmanController::class, 'complete_todo']);

Route::get('/task', [TaskmanController::class, 'get_task']);
Route::post('/task', [TaskmanController::class, 'post_task']);

Route::post('/taskdetail', [TaskmanController::class, 'taskdetail']);

Route::get('/question', [TaskmanController::class, 'question']);

Route::get('/transition', [TaskmanController::class, 'transition']);

Route::post('/add_question', [TaskmanController::class, 'add_question']);

Route::get('/question_detail', [TaskmanController::class, 'question_detail']);

Route::post('/answer', [TaskmanController::class, 'answer']);

Route::post('/task_delete', [TaskmanController::class, 'task_delete']);

Route::get('/admin', [TaskmanController::class, 'admin']);

Route::get('/repassword', function() {
    return view('taskman.repassword');
});

Route::post('/repass_comp', [TaskmanController::class, 'repass']);