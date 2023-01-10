<?php

use Module\StaticBlock\Http\Controllers\Admin\StaticBlockController;

Route::prefix('static-block')->group(function () {

    Route::get('', [StaticBlockController::class, 'index'])
        ->name('static-block.admin.static-block.index')
        ->middleware('admin.can:static-block.admin.static-block.index');

    Route::get('create', [StaticBlockController::class, 'create'])
        ->name('static-block.admin.static-block.create')
        ->middleware('admin.can:static-block.admin.static-block.create');

    Route::post('/', [StaticBlockController::class, 'store'])
        ->name('static-block.admin.static-block.store')
        ->middleware('admin.can:static-block.admin.static-block.create');

    Route::get('{id}/edit', [StaticBlockController::class, 'edit'])
        ->name('static-block.admin.static-block.edit')
        ->middleware('admin.can:static-block.admin.static-block.edit');

    Route::put('{id}', [StaticBlockController::class, 'update'])
        ->name('static-block.admin.static-block.update')
        ->middleware('admin.can:static-block.admin.static-block.edit');

    Route::delete('{id}', [StaticBlockController::class, 'destroy'])
        ->name('static-block.admin.static-block.destroy')
        ->middleware('admin.can:static-block.admin.static-block.destroy');

});
