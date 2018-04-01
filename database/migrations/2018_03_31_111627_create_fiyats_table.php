<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiyatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiyats', function (Blueprint $table) {
            $table->increments('id');
            $table->float('saat_fiyati');
            $table->float('saat_puani')->default(5);
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
        
        Schema::dropIfExists('fiyats');
    }
}
