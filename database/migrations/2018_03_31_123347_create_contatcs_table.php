<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatcsTable extends Migration
{
    public function up()
    {
        Schema::create('contatcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adi');
            $table->string('email');
            $table->string('konu');
            $table->string('mesaj');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('contatcs');
    }
}
