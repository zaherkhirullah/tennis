<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKortTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kort_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isim');
            $table->float('saat_fiyati');
            $table->float('saat_puani')->default(5);
            $table->boolean('durum')->default(0); // active or not 
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
        Schema::dropIfExists('kort_types');
    }
}
