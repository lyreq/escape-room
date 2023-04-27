<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeSlotsTable extends Migration
{
    public function up()
    {
        Schema::create('time_slots', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->unsignedBigInteger('escape_room_id');
            $table->foreign('escape_room_id')->references('id')->on('escape_rooms')->onDelete('cascade');
            $table->timestamps();
        });
        
        
    }

    public function down()
    {
        Schema::dropIfExists('time_slots');
    }
}
