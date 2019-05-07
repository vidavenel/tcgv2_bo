<?php

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Tcgv2\Bo\Responses\CommandeAbandonneesResponse;
use Tcgv2\Bo\Responses\CommandeIndexResponse;
use Tcgv2\Bo\Responses\CommandeShowResponse;
use Tcgv2\Bo\Responses\DashboardResponse;
use Tcgv2\Bo\Test\Models\Commande;


Route::get('/dashboard', function () {
    return new DashboardResponse(url('data/dashboard/total.json'),url('data/dashboard/evolution.json'), url('data/dashboard/distribution.json'));
})->name('admin.dashboard');

Route::get('/commandes', function (Request $request) {
    if ($request->isXmlHttpRequest()) {
        if ($request->filter === 'invalid') {
            return response()->file(__DIR__.'/../public/data/commandes/invalid.json');
        }
        return response()->file(__DIR__.'/../public/data/commandes/data.json');
    }
    return new CommandeIndexResponse();
})->name('admin.commande.index');

Route::get('/commandes-accessoires', function (Request $request) {
    return new CommandeIndexResponse(null, null,null, 'with_accessories');
})->name('admin.commande.accessories');

Route::get('/commande/{id}', function () {
    $commande = new Commande();
    return new CommandeShowResponse($commande, collect());
})->name('admin.commande.show');

Route::get('/commandes-non-payees', function () {
    return new CommandeAbandonneesResponse();
})->name('admin.commande.abandonnee');
