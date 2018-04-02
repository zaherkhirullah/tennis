<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKortsTable extends Migration
{
   
    public function up()
    {
        Schema::create('korts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adi')->unique();
            $table->boolean('isDeleted')->default(0); // active or not 
            $table->boolean('tip'); // tek or cift 
            $table->integer('fiyat_id')->unsigned();
            $table->timestamps();
            });
            
        // Schema::table('korts', function ( $table) {
        //     $table->foreign('fiyat_id')->references('id')->on('fiyats');
        //    });
        
    }


    public function down()
    {
        // Schema::table('korts', function ( $table) {
        //     $table->dropForeign('korts_fiyat_id_foreign');
        // });
        Schema::dropIfExists('korts');
    }
}
