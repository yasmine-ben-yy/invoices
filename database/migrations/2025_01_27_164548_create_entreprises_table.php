<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique()->nullable(); // Relation un-à-un
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nom'); // Nom de l'entreprise
            $table->string('adresse');
            $table->string('code_postal');
            $table->string('ville');
            $table->string('pays');
            $table->string('numero_telephone');
            $table->string('email')->unique();
            $table->string('site_web')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
