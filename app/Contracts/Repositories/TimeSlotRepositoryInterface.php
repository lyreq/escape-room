<?php


namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Collection;

interface TimeSlotRepositoryInterface
{
    public function  index($id);
}
