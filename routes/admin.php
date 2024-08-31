<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\ContentController;

Route::get('/clear', function () {
    Artisan::call('optimize:clear');

    return 'Success! Your are very lucky!';
});

Route::middleware(['auth:sanctum'])->group(function () {



    // route
    Route::prefix('contents')->group(function () {
        Route::controller(ContentController::class)->group(function () {
            Route::get('/',                         'index');
            Route::post('/',                        'store');
            Route::get('/trash',                    'trashList');
            Route::get('trash',                     'trashList');
            Route::get('/{id}',                     'show');
            Route::put('/{id}',                     'update');
            Route::delete('/{id}',                  'destroy');
            Route::put('/{id}/restore',             'restore');
            Route::delete('/{id}/permanent-delete', 'permanentDelete');
        });
    });




});
