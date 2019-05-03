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

Route::get('/commande/{id}', function () {
    $commande = new \Tcgv2\Bo\Test\Models\Commande();
    return new \Tcgv2\Bo\Responses\CommandeShowResponse($commande, collect());
    //$commande =
});

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

Route::get('/commande/facture/{id}', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.commande.facture');

Route::get('/commande/incomplet/{id}', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.commande.incomplet');

Route::get('/commande/complet/{id}', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.commande.complet');

Route::get('/client/compte/{id}', function () {
    return new DashboardResponse('test','test', 'test');
})->name('admin.client.compte');