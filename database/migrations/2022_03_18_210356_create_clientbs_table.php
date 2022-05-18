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
        Schema::create('clientbs', function (Blueprint $table) {
            $table->id();
            $table->String('nom');
            $table->String('prenom');
            $table->String('civilité');
            $table->date('datenais');
            $table->String('nature_de_client');
            $table->text('adresse');
            $table->String('telephone');
            $table->string('email');
            $table->string('Photo');
            $table->unsignedBigInteger('AgenceID');
            $table->foreign('AgenceID')
            ->references('id')
            ->on('Agences')
            ->onDelete('restrict')
            ->onUpdate('restrict');
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
        Schema::dropIfExists('clientbs');
    }
};
