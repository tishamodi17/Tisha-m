<?php
//Step 4: Create API Routes
 //routes/api.php

use App\Http\Controllers\Api\StudentController;

Route::middleware('auth:api')->group(function () {
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
});
?>