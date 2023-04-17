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
            $table->enum("sexePatient",["Monsieur","Madame","autre"]);
            $table->string("dateNaissancePatient");
	        $table->string("cin",8)->format('DA')->unique();
            

          
            // $table->unsignedBigInteger("user_id")->nullable()->change();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
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
