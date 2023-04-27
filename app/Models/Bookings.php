<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Bookings extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = ["user_id", "escape_room_id", "time_slot_id", "num_participants", "discount_applied"];
}
