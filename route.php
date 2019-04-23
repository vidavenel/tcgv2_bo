<?php
// Route a utiliser Uniquement a des fins de developpement
use Tcgv2\Bo\Responses\DashboardResponse;

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return new DashboardResponse(null, null, null);
    });
});