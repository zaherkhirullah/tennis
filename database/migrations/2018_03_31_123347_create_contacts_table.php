<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adi');
            $table->string('email');
            $table->string('konu');
            $table->string('mesaj');
            $table->boolean('durum')->default(0); // active or not             
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
