<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->unique()->unsigned();
            $table->string('email',255)->unique();
            $table->string('password',255);
            $table->string('cinsiyet',255)->nullable();
            $table->string('adres',255)->nullable();
            $table->integer('yas')->nullable();
            $table->double('puan')->default(0);
            $table->boolean('durum')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';   
            $table->primary('id');                
            $table->foreign('id')->references('id')->on('kiralayans');
                            
        });
        
    }


    public function down()
    {
        Schema::table('users', function ( $table) {
            $table->dropForeign('users_id_foreign');
        });
        Schema::dropIfExists('users'); 
    }
}
