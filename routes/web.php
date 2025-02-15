<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\Auth\RegisterController;


use App\Http\Controllers\EntrepriseController;

// Page d'accueil
Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['web'])->group(function () {
    Route::get('/entreprises.create', [EntrepriseController::class, 'create'])->name('entreprises.create');

    Route::post('/entreprises', [EntrepriseController::class, 'store'])->name('entreprises.store');

});


// Routes spécifiques

// Authentification (si compatible)
Auth::routes();

// Page "home" après connexion
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    // Liste des clients
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/{id}/factures', [ClientController::class, 'listerFactures'])->name('clients.factures');

    // Créer un client
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

    // Modifier un client
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');

    // Supprimer un client
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // Afficher un client
    Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
     // Liste des clients
     Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');

     // Créer un client
     Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
     Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
 
     // Modifier un client
     Route::get('/produits/{id}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
     Route::put('/produits/{id}', [ProduitController::class, 'update'])->name('produits.update');
 
     // Supprimer un client
     Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');
 
     // Afficher un client
     Route::get('/produits/{id}', [ProduitController::class, 'show'])->name('produits.show');
     Route::get('/factures', [FactureController::class, 'index'])->name('factures.index');

    // Créer un client
    Route::get('/factures/create', [FactureController::class, 'create'])->name('factures.create');
    Route::post('/factures', [FactureController::class, 'store'])->name('factures.store');
    Route::get('/factures/{id}', [FactureController::class, 'show'])->name('factures.show');

});
Route::get('/facture/{id}/pdf', [FactureController::class, 'downloadPDF'])->name('factures.downloadPDF');

