<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRezervasyonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezervasyons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kort_id')->unsigned();
            $table->integer('kiralayan_id')->unsigned();
            $table->integer('servis_id')->unsigned();
            $table->time('start_at');   // başlangiş saati 
            $table->time('end_at');     // bitiş saati 
            $table->timestamp('date');  // tarih  
            $table->string('servis_address');  // servis gidecek adresi
            // servis saati her zaman rezervasyonun saati 30 dakika önce                       
            $table->time('servis_time');   
            $table->float('price'); // odenecek miktari 
            $table->boolean('pay_status'); /// paid or not // odenmiş yada odenmemiş
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
