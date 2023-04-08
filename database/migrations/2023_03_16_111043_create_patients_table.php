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
        Schema::create('patients', function (Blueprint $table) {
            $table->codePatient();
            $table->string("nomPatient",30);
            $table->string("prenomPatient",30);
            $table->string("adressPatient");
            $table->string("telefonePatient");
            $table->string("cin")->unique();
            $table->string("sexePatient");
            $table->string("dateNaissancePatient");
          

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
        Schema::dropIfExists('patients');
    }
};
