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
            $table->id();
            $table->string("nomPatient",30)->nullable();
            $table->string("prenomPatient",30)->nullable();
            $table->string("adressPatient")->nullable();
            $table->string("telefonePatient")->nullable();
            $table->enum("sexePatient",["Monsieur","Madame","autre"])->nullable();
            $table->string("dateNaissancePatient")->nullable();
	        $table->string("cin",8)->format('DA')->unique();
	        $table->string("code")->unique();
            

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       
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
