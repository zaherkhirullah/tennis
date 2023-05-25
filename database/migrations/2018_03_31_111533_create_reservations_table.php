<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stage_id')->unsigned();
            $table->integer('renter_id')->unsigned();
            $table->integer('service_id')->unsigned()->nullable();
            $table->dateTime('start_at');   // başlangiş houri
            $table->dateTime('end_at');   // bitiş houri
            $table->string('service_address')->nullable();  // service gidecek adresi
            $table->time('service_hour');   
            $table->double('payable'); // payable miktari 
            $table->double('paid'); /// paid or not // odenmiş yada odenmemiş
            $table->float('win_points'); /// paid or not // odenmiş yada odenmemiş
            $table->boolean('status')->default(0); // active or not
            $table->timestamps();

            $table->foreign('stage_id')->references('id')->on('stages');
            $table->foreign('renter_id')->references('id')->on('renters');
            $table->foreign('service_id')->references('id')->on('services');
        });
      
    }
    
    public function down()
    {
        Schema::table('reservations', function ( $table) {
            $table->dropForeign('reservations_stage_id_foreign');
            $table->dropForeign('reservations_service_id_foreign');
            $table->dropForeign('reservations_renter_id_foreign');
        });
        Schema::dropIfExists('reservations');
    }
}
