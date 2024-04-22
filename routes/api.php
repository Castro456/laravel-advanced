<?php

use App\Http\Controllers\AdminAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [AdminAPIController::class, 'list_all_users'])->name('list/users');

Route::post('/create-users', [AdminAPIController::class, 'create_users'])->name('create/users');

Route::delete('/delete-users/{user_id}', [AdminAPIController::class, 'delete_users'])->name('delete/users');

