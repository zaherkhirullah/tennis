<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('number_plate'); // number_plate numurası
            $table->string('driver_name'); // şöförün adi
            $table->string('driver_phone'); // şöförün numurası
            $table->boolean('status')->default(0); // active or not
            $table->timestamps();
        });
        
    }


    public function down()
    {
        Schema::dropIfExists('service');
    }
}
