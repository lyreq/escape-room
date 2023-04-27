<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('time_slot_id');
            $table->escape_room_id('time_slot_id');
            $table->integer('num_participants');
            $table->double('discount_applied')->default(0);
            $table->timestamps();
        });
        
        
        
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
