<?php

use App\Http\Controllers\API\ArtistController;
use App\Http\Controllers\API\Auth\AuthenticateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('throttle:api')->as('api.')->group(function () {
    Route::get('/', function () {
        return [
            'success' => true,
            'version' => '1.0.0',
        ];
    });

    Route::apiResource('artists', ArtistController::class);

    Route::post('login', [AuthenticateController::class, 'login'])->name('user.login');

    // ... Other routes
});

// Route::middleware('throttle:member')->group(function () {}); ตรง member เปลี่ยนสำหรับเรียกกลุ่มผู้ใช้อื่น

Route::middleware(['throttle:api', 'auth:sanctum'])->as('api.')->group(function () {

    Route::delete('revoke', [AuthenticateController::class, 'revoke'])->name('user.revoke');

//    Route::apiResource('artists', ArtistController::class);
});
