<?php

use App\Http\Controllers\API\V1\ArticleController;
use App\Http\Controllers\API\V1\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

// http:: //badger.test/api/v1/articles
// Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function (){
//     // Articles
//     Route::apiResource('/articles', ArticleController::class);

//     // Authors
//     Route::get('/authors/{user]', [AuthorController::class, 'show'])->name('authors');
// });


// sanctum disabled
// http://127.0.0.1:8000/api/v1/articles
Route::group(['prefix' => 'v1'], function (){
    // Articles
    Route::apiResource('/articles', ArticleController::class);

    // Authors
    Route::get('/authors/{user]', [AuthorController::class, 'show'])->name('authors');
});
