<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class,'regsiter']);
Route::post('login', [AuthController::class,'login']);
Route::post('logout', [AuthController::class,'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('courses', CourseController::class)->middleware(['role_or_permission:manage courses']);
    Route::apiResource('enrollments', EnrollmentController::class)->middleware(['role_or_permission:manage enrollemnts'])->except('update');
    Route::apiResource('payments',PaymentController::class)->middleware(['role_or_permission:manage payments'])->except('update');
    Route::apiResource('communications', CommunicationController::class)->middleware(['role_or_permission:manage communications'])->except('update');
    Route::apiResource('students', StudentController::class)->middleware(['role_or_permission:manage students']);
});