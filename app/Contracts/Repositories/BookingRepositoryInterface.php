<?php


namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Collection;

interface BookingRepositoryInterface
{
    public function  index();
    public function show(int $id);
    public function store($data);
    public function destroy(int $id);
}
