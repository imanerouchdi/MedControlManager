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
        Schema::create('rendez_vous', function (Blueprint $table) {
            $table->numeroRdv();
            $table->date('dateRdv');
            $table->date('heureRdv');
            $table->unsignedBigInteger('codePatient');
            $table->unsignedBigInteger('codeMed');
            $table->string('status');
            $table->string('valide');


            $table->foreign('codePatient')
            ->references('codePatient')
            ->on('patients')
            ->onDelete('cascade');

            $table->foreign('codeMed')
            ->references('codeMed')
            ->on('medecins')
            ->onDelete('cascade');
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
        Schema::dropIfExists('rendez_vous');
    }
};
