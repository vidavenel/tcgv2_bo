<?php

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Tcgv2\Bo\Responses\CommandeIndexResponse;
use Tcgv2\Bo\Responses\CommandeShowResponse;
use Tcgv2\Bo\Responses\DashboardResponse;
use Tcgv2\Bo\Test\Models\Commande;

Route::get('/test', function () {
    dd('test');
});

Route::get('/dashboard', function () {
    return new DashboardResponse(url('data/dashboard/total.json'),url('data/dashboard/evolution.json'), url('data/dashboard/distribution.json'));
})->name('admin.dashboard');

Route::get('/commandes', function () {
    $commandes = collect();
    for ($i = 0; $i < 50; $i++) {
        $commandes->push(new Commande());
    }
    $paginator = new LengthAwarePaginator($commandes, 50, 25);
    $demarches = collect();
    $demarches->push(['nom' => 'Changement titulaire', 'id' => 1]);
    $demarches->push(['nom' => 'Changement de nom', 'id' => 2]);

    $statuts = collect();
    $statuts->push(['nom' => 'En attente', 'id' => 1]);
    $statuts->push(['nom' => 'Complet', 'id' => 2]);

    $paiements = collect();
    $paiements->push(['nom' => 'Montico', 'id' => 1]);
    $paiements->push(['nom' => 'Payplug', 'id' => 2]);

    return new CommandeIndexResponse($paginator);
})->name('admin.commande.index');

Route::get('/commande/{id}', function () {
    $commande = new Commande();
    return new CommandeShowResponse($commande, collect());
})->name('admin.commande.show');

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