<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cagnottes', function (Blueprint $table) {
            $table->id();
            $table->string('codeCagnotte')->unique();
            $table->dateTime('dateDebut')->timestamps();
            $table->dateTime('dateFin')->nullable();
            $table->float('somme')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cagnottes');
    }
};
