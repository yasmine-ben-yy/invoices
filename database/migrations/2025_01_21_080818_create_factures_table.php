<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relation avec users
            $table->foreignId('client_id')->constrained()->onDelete('cascade'); // Relation avec clients
            $table->date('date_facture');
            $table->decimal('total_ht', 10, 2)->default(0); // Montant total hors taxe
            $table->decimal('tva', 10, 2)->default(0); // Montant de la TVA
            $table->decimal('total', 10, 2)->default(0);
            $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
   
     public function down()
     {
         Schema::dropIfExists('factures');
     }
};
