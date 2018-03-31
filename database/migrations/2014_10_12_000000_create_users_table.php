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
            $table->string('full_name',50);
            $table->string('username',255)->unique();
            $table->string('email',255)->unique();
            $table->string('phone_number',255)->unique();            
            $table->string('password',255);
            $table->integer('role_id')->unsigned()->default(2);// user role = 2
            $table->boolean('isDeleted')->default(0);
            $table->rememberToken();
            $table->timestamps();  
            $table->engine = 'InnoDB';

            // $table->ipAddress('ip')->nullable();    
            // $table->boolean('confirm_email')->default(0);            
            
        });
        Schema::table('users', function ( $table) {
            $table->foreign('role_id')->references('id')->on('roles');
           });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ( $table) {
            $table->dropForeign('users_role_id_foreign');
        });
           
        Schema::dropIfExists('users'); 
    }
}
