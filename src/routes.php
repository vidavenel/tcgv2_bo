<?php

use Illuminate\Support\Facades\Route;
use Tcgv2\Bo\Responses\DashboardResponse;

Route::get('/test', function () {
    dd('test');
});

Route::get('/dashboard', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.dashboard');

Route::get('/commandes', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.commande.index');

Route::get('/commandes-non-payees', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.commande.abandonnee');

Route::get('/code-promo', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.discount.index');

Route::get('/employee', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.employees.index');

Route::get('/commande-search', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.commande_search');