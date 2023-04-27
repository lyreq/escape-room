<?php

namespace App\Repositories;

use App\Contracts\Repositories\BookingRepositoryInterface;
use App\Http\Traits\Response;
use App\Models\Bookings;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Exception;

class BookingRepository implements BookingRepositoryInterface
{

    use Response;

    public function index()
    {
        try {
            $bookings = Bookings::all();
            return $this->successResponse("Transaction Successful!", $bookings);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
    public function show(int $id)
    {
        try {
            $bookings = Bookings::find($id);
            return $this->successResponse("Transaction Successful!", $bookings);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function store($data)
    {
        try {
            $booking =   Bookings::create($data);
            return $this->successResponse("Transaction Successful!",$booking);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
    public function destroy(int $id)
    {
        try {
            $bookings = Bookings::find($id);

            $booking = Bookings::find($id);

            if (!$booking) {
                return $this->errorResponse("Booking not found", 404);
            }

            if ($booking->user_id != Auth::user()->id) {
                return $this->errorResponse("Unauthorized", 401);
            }

            $booking->delete();
            return $this->successResponse("Transaction Successful!");
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
