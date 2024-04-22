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

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){
    Route::get('/', [AdminAPIController::class, 'list_all_admins']);
    
    Route::post('/create', [AdminAPIController::class, 'create_admin']);
    
    Route::delete('/delete-admin/{admin_id}', [AdminAPIController::class, 'delete_admin']);
});

