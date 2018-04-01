<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKiralayansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiralayans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('telefon')->unique();
            $table->string('adi');
            $table->boolean('isDeleted')->default(0); // active or not             
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
        Schema::dropIfExists('kiralayans');
    }
}
