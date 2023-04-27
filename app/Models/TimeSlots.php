<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class TimeSlots extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable = ["start_time","end_time","escape_room_id"];
    public $timestamps = true;
}
