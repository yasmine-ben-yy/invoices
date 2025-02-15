<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() :void
    {
        Schema::create('facture_produit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facture_id')->constrained()->onDelete('cascade'); // Relation avec la table factures
            $table->foreignId('produit_id')->constrained()->onDelete('cascade'); // Relation avec la table produits
            $table->integer('quantite'); // Quantité de produit dans la facture
            $table->decimal('prix_unitaire', 10, 2); // Prix unitaire du produit
            $table->decimal('total', 10, 2); // Montant total pour ce produit (prix_unitaire * quantite)
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture_produit');
    }
};
