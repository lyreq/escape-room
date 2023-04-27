<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Bookings;
use App\Repositories\BookingRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repo = new BookingRepository();
        return $repo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $discount = 0;
        if (strtotime(Auth::user()->date_of_birth) == strtotime(Carbon::today())) {
            $discount = 0.1; // 10% discount
        }
        $data['discount_applied'] = $discount;
        $repo = new BookingRepository();
        return $repo->store($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $repo = new BookingRepository();
        return $repo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $repo = new BookingRepository();
        return $repo->destroy($id);
    }
}
