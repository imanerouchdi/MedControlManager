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
        Schema::create('rendez-vouses', function (Blueprint $table) {
            $table->numeroRdv();
            $table->date('dateRdv');
            $table->date('heureRdv');
            $table->string('nomPatient');
            $table->string('status');
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
        Schema::dropIfExists('rendez-vouses');
    }
};
