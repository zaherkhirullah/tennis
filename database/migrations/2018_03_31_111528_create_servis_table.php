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
            $table->string('isim')->unique();
            $table->string('plaka'); // plaka numurası
            $table->string('sofor_adi'); // şöförün adi
            $table->string('sofor_numarasi'); // şöförün numurası
            $table->boolean('durum')->default(0); // active or not 
            $table->timestamps();
        });
        
    }


    public function down()
    {
        Schema::dropIfExists('servis');
    }
}
