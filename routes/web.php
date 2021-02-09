<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ChatController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/chat', function () {
        return Inertia::render('Chat/Window');
    })->name('chat');

    // Chat routes
    // Note: For simplicity purposes, these routes are added here,
    // in real world application, these should be placed in api.php
    Route::get('/chat/rooms', [ChatController::class, 'rooms']);
    Route::get('/chat/rooms/{room}/messages', [ChatController::class, 'messages']);
    Route::post('/chat/{room}', [ChatController::class, 'storeMessage']);
});
