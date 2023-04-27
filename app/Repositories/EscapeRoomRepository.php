<?php

namespace App\Repositories;

use App\Contracts\Repositories\EscapeRoomRepositoryInterface;
use App\Http\Traits\Response;
use App\Models\EscapeRooms;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Exception;

class EscapeRoomRepository implements EscapeRoomRepositoryInterface
{

    use Response;
    public function index()
    {
        try {
            $escapeRooms = EscapeRooms::all();
            return $this->successResponse("Transaction Successful!", $escapeRooms);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $escapeRoom = EscapeRooms::find($id);
            return $this->successResponse("Transaction Successful!", $escapeRoom);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
