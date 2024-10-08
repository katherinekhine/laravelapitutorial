<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('student', [StudentController::class, 'index']);
Route::post('student', [StudentController::class, 'create']);
Route::put('student/edit/{id}', [StudentController::class, 'update']);
Route::delete('student/delete/{id}', [StudentController::class, 'delete']);
