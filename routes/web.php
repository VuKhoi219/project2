<?php

use App\Models\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;

Route::get('/', [UserController::class,'viewIndex'])->name('home');
Route::get('/index', [UserController::class,'viewHome'])->name('homeUser');

Route::get('/user/login', [UserController::class, 'viewLogin'])->name('login');
Route::post('/user/login/post', [UserController::class, 'loginPost'])->name('login.post');

Route::get('/user/register', [UserController::class, 'viewRegister'])->name('register');
Route::post('/user/register/post', [UserController::class, 'registerPost'])->name('register.post');

Route::get('/user/update', [UserController::class, 'viewUpdate'])->name('update');
Route::post('/user/update1', [UserController::class, 'update'])->name('update.post');

Route::get('/user/update/password', [UserController::class, 'viewUpdatePassword'])->name('updatePassword');
Route::post('/user/update/password1', [UserController::class, 'updatePassword'])->name('updatePassword.post');


Route::get('/user/topic',[UserController::class,'viewTopic'])->name('topic');

Route::post('/user/topic/saveId',[UserController::class, 'saveIdType'])->name('saveId');

Route::get('/user/game',[UserController::class,'viewGame'])->name('game');
