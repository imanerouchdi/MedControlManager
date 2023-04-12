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
        Schema::create('rendez_vs', function (Blueprint $table) {
            $table->numeroRdv();
            $table->foreignId('user_id')->nullable();
            $table->date('dateRdv');
            $table->date('heureRdv');
            $table->string('codePatient');
            $table->string('nomPatient');
            $table->string('prenomPatient');
            $table->string('CIN');
            
            $table->string('valide');

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
        Schema::dropIfExists('rendez_vs');
    }
};
