<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoListController;
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



Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('todo-lists', [TodoListController::class, 'index'])->name('todo-lists');
Route::post('todo-lists', [TodoListController::class, 'store'])->name('store'); 
Route::get('/todo-lists/{id}/edit', [TodoListController::class, 'edit'])->name('edit');
Route::put('/todo-lists/{id}', [TodoListController::class, 'update'])->name('update');
Route::delete('todo-lists/{todoList:id}', [TodoListController::class, 'destroy'])->name('destroy');
