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
            $table->increments('id');
            $table->string('adisoyadi',50);
            $table->string('email',255)->unique();
            $table->string('telefon',255)->unique();            
            $table->string('password',255);
            $table->boolean('isDeleted')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';

            // $table->ipAddress('ip')->nullable();    
            // $table->boolean('confirm_email')->default(0);            
            
        });
        

    }

    public function down()
    {
        Schema::dropIfExists('users'); 
    }
}
