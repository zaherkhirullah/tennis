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
            $table->float('saat_price');
            $table->float('saat_puan');
            $table->integer('kort_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('fiyats', function ( $table) {
            $table->foreign('kort_id')->references('id')->on('korts');
           });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fiyats', function ( $table) {
            $table->dropForeign('fiyats_kort_id_foreign');
        });
           
        Schema::dropIfExists('fiyats');
    }
}
