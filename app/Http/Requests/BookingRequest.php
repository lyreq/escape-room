<?php

namespace App\Http\Requests;

use App\Models\Bookings;
use App\Models\EscapeRooms;
use App\Models\TimeSlots;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "escape_room_id" => "required|integer",
            "time_slot_id" => "required|integer",
            "num_participants" => "required|integer",
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $escape_room_id = $this->input('escape_room_id');   
            $num_participants = $this->input('num_participants');
            $escaperoom = EscapeRooms::where("id", $escape_room_id)->first();

            if (!$escaperoom) {

                throw new HttpResponseException(response()->json([
                    'status' => "error",
                    "code" => Response::HTTP_UNPROCESSABLE_ENTITY,
                    'message' => "Escape Room ID not found"
                ], Response::HTTP_UNPROCESSABLE_ENTITY));
            }
            if ($num_participants > $escaperoom->max_participants) {
                throw new HttpResponseException(response()->json([
                    'status' => "error",
                    "code" => Response::HTTP_UNPROCESSABLE_ENTITY,
                    'message' => "The maximum number of participants must be no more than {$escaperoom->max_participants}."
                ], Response::HTTP_UNPROCESSABLE_ENTITY));
            }

            $time_slot_id = $this->input('time_slot_id');
            $time_slots = TimeSlots::where("id", $time_slot_id)->where("escape_room_id", $escape_room_id)->count();
            if ($time_slots == 0) {
                throw new HttpResponseException(response()->json([
                    'status' => "error",
                    "code" => Response::HTTP_UNPROCESSABLE_ENTITY,
                    'message' => "Time Slot and Escape Room ID do not match "
                ], Response::HTTP_UNPROCESSABLE_ENTITY));
            }


            $check = Bookings::where("user_id",Auth::user()->id)->where("escape_room_id",$escape_room_id)->where("time_slot_id",$time_slot_id)->count();
            if($check > 0){
                throw new HttpResponseException(response()->json([
                    'status' => "error",
                    "code" => Response::HTTP_UNPROCESSABLE_ENTITY,
                    'message' => "Booking already exists"
                ], Response::HTTP_UNPROCESSABLE_ENTITY));
            }
        });
    }

    protected function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'status' => "error",
            "code" => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => $validator->errors()->first()
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
