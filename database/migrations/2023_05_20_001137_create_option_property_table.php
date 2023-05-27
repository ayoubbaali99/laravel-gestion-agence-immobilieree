<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_property', function (Blueprint $table) {
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('property_id');
            $table->timestamps();

            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_property');
    }
}
