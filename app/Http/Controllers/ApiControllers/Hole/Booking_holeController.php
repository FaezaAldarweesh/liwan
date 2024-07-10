<?php

namespace App\Http\Controllers\ApiControllers\Hole;


use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking_holeRequest;
use App\Http\Services\HoleServices;
use App\Http\Traits\ApiResponseTrait;




class Booking_holeController extends Controller
{
    protected $HoleServices;
    use ApiResponseTrait;

    public function __construct(HoleServices $HoleServices)
    {
        $this->HoleServices = $HoleServices;
    }

//=============================================================================================================
    public function check_on_booking($id_hole,$date)
    {
        try {
    
            return $this->HoleServices->CheckOnBooking($id_hole,$date);
    
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $this->customeResponse('something went wrong with fetching check on booking', 400);
        }
    }

    //=======================================================================================================

    public function booking_hole($id_hole, $id_plan, Booking_holeRequest $request)
    {
        try {
    
            return $this->HoleServices->BookingHole($id_hole, $id_plan,$request);
    
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $this->customeResponse('something went wrong with booking hole', 400);
        }

      
    }
    
}

