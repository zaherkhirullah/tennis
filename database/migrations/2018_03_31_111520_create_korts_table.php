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
            $table->string('isim')->unique();
            $table->integer('type_id')->unsigned();
            $table->boolean('durum')->default(0); // active or not 
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('kort_types');
            
            });
    }


    public function down()
    {
        Schema::table('korts', function ( $table) {
            $table->dropForeign('korts_type_id_foreign');
        });
        Schema::dropIfExists('korts');
    }
}
