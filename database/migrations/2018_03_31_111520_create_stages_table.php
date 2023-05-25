<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
   
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->boolean('type');   // 0 tek , 1 çift
            $table->float('hour_fee');
            $table->float('hour_score')->default(5);
            $table->boolean('status')->default(0); // active or not
            $table->timestamps();
            });
    }
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
