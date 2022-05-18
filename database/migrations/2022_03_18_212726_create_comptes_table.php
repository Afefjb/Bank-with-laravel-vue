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
        Schema::create('Comptes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_de_compte');
            $table->string('solde');
            $table->string('type');
            $table->unsignedBigInteger('AgenceID');
            $table->foreign('AgenceID')
            ->references('id')
            ->on('Agences')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->unsignedBigInteger('ClientbID');
            $table->foreign('ClientbID')
                ->references('id')
                ->on('Clientbs')
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
        Schema::dropIfExists('Comptes');
    }
};
