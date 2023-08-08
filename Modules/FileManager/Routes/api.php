<?php

use Illuminate\Support\Facades\Route;
use Modules\FileManager\Http\Controllers\FileController;
use Modules\FileManager\Http\Controllers\FolderController;

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

/**--------------------------------------------------------------------------------
 * Folder  Controller  => START
 * --------------------------------------------------------------------------------*/
Route::prefix('v1')->group(function () {
    Route::middleware(['auth:Api'])->group(function () {
        Route::prefix('admin/folders')->group(function () {
            Route::get('/', [FolderController::class, 'index']);
            Route::get('{folder}', [FolderController::class, 'show'])->whereNumber('folder');
            Route::post('/', [FolderController::class, 'store']);
            Route::put('{folder}', [FolderController::class, 'update'])->whereNumber('folder');
            Route::delete('{folder}', [FolderController::class, 'destroy'])->whereNumber('folder');
        });
    });
});
/**--------------------------------------------------------------------------------
 * Folder  Controller => END
 * --------------------------------------------------------------------------------*/

/**--------------------------------------------------------------------------------
 * File  Controller  => START
 * --------------------------------------------------------------------------------*/
Route::prefix('v1')->group(function () {
    Route::middleware(['auth:Api'])->group(function () {
        Route::prefix('admin/files')->group(function () {
            Route::get('/', [FileController::class, 'adminIndex']);
            Route::post('/', [FileController::class, 'adminStore']);
            Route::get('{file}', [FileController::class, 'show'])->whereNumber('file');
            Route::put('{file}', [FileController::class, 'update'])->whereNumber('file');
            Route::delete('{file}', [FileController::class, 'destroy'])->whereNumber('file');
        });
    });
    Route::prefix('files')->group(function () {
        Route::get('/', [FileController::class, 'clientIndex']);
        Route::post('/', [FileController::class, 'clientStore']);
        Route::get('{file}', [FileController::class, 'show'])->whereNumber('file');
        Route::put('{file}', [FileController::class, 'update'])->whereNumber('file');
        Route::delete('{file}', [FileController::class, 'destroy'])->whereNumber('file');
    });
});
/**--------------------------------------------------------------------------------
 * File  Controller => END
 * --------------------------------------------------------------------------------*/
