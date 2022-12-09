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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default('1');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('genre')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('paysNaissance')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('codePostal')->nullable();
            $table->string('pays')->nullable();
            $table->string('telephone')->nullable();
            $table->string('contactAnnex')->nullable();
            $table->string('status')->default("en attente");
            $table->float('capital')->default(0);
            $table->float('soldeInvestissement')->default(0);

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
        Schema::dropIfExists('users');
    }
};
