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
            $table->boolean('type');   // 0 tek , 1 çift
            $table->float('saat_ucreti');
            $table->float('saat_puani')->default(5);
            $table->boolean('durum')->default(0); // active or not 
            $table->timestamps();
            });
    }
    public function down()
    {
        Schema::dropIfExists('korts');
    }
}
