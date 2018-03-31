<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('plaka'); // plaka numurası
            $table->string('driver_name'); // şöförün adi
            $table->string('driver_phone_number'); // şöförün numurası
            $table->boolean('status'); // active or not 
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
        Schema::dropIfExists('servis');
    }
}
