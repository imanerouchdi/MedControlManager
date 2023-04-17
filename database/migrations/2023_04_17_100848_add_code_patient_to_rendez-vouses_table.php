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
        Schema::table('rendez-vouses', function (Blueprint $table) {
            $table->unsignedBigInteger('codePatient');
            $table->foreign('codePatient')->references('codePatient')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rendez-vouses', function (Blueprint $table) {
            //
        });
    }
};
