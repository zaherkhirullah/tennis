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
            $table->time('baslangis_saat');   // başlangiş saati 
            $table->time('bitis_saat');     // bitiş saati 
            $table->timestamp('tarih');  // tarih  
            $table->string('servis_addresi');  // servis gidecek adresi
            // servis saati her zaman rezervasyonun saati 30 dakika önce                       
            $table->time('servis_saat');   
            $table->float('odenecek'); // odenecek miktari 
            $table->boolean('odenme_durumu'); /// paid or not // odenmiş yada odenmemiş
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
        Schema::dropIfExists('rezervasyons');
    }
}
