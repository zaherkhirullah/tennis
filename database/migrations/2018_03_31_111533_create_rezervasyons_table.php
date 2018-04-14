<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRezervasyonsTable extends Migration
{

    public function up()
    {
        Schema::create('rezervasyons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kort_id')->unsigned();
            $table->integer('kiralayan_id')->unsigned();
            $table->integer('servis_id')->unsigned();
            $table->dateTime('baslangis');   // başlangiş saati 
            $table->dateTime('bitis');   // bitiş saati 
            $table->string('servis_adresi');  // servis gidecek adresi
            $table->time('servis_saat');   
            $table->double('odenecek'); // odenecek miktari 
            $table->double('odenmis'); /// paid or not // odenmiş yada odenmemiş
            $table->float('kazanacak_puan'); /// paid or not // odenmiş yada odenmemiş
            $table->boolean('durum')->default(0); // active or not             
            $table->timestamps();
    
            $table->foreign('kort_id')->references('id')->on('korts');
            $table->foreign('kiralayan_id')->references('id')->on('kiralayans');
            $table->foreign('servis_id')->references('id')->on('servis');
        });
      
    }
    
    public function down()
    {
        Schema::table('rezervasyons', function ( $table) {
            $table->dropForeign('rezervasyons_kort_id_foreign');
            $table->dropForeign('rezervasyons_servis_id_foreign');
            $table->dropForeign('rezervasyons_kiralayan_id_foreign');
        });
        Schema::dropIfExists('rezervasyons');
    }
}
