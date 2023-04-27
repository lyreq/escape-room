<?php


namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Collection;

interface EscapeRoomRepositoryInterface
{
    public function  index();
    public function  show($id);
}
