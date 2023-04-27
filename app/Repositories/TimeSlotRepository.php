<?php

namespace App\Repositories;

use App\Contracts\Repositories\TimeSlotRepositoryInterface;
use App\Http\Traits\Response;
use App\Models\EscapeRooms;
use App\Models\TimeSlots;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Exception;

class TimeSlotRepository implements TimeSlotRepositoryInterface
{

    use Response;
    
    public function index($id)
    {
        try {
            $escapeRoom = EscapeRooms::find($id);
            if (!$escapeRoom) {
                return $this->errorResponse('Escape room not found',404);
            }
            $timeSlots = TimeSlots::where("escape_room_id", $id)->get();
            return $this->successResponse("Transaction Successful!", $timeSlots);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
