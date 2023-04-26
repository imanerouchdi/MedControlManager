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
        Schema::create('bussiness_hours', function (Blueprint $table) {
            $table->id();
            $table->string('day')->unique();
            $table->time('from')->nullable();
            $table->time('to')->nullable();
            $table->unsignedInteger('step')->default(60)->nullable();
            $table->boolean('off')->default(false)->nullable();
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
        Schema::dropIfExists('bussiness_hours');
    }
};
