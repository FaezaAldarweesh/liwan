<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Hole;
use App\Models\Plane_Hole;
use App\Models\services;
use App\Models\booking_hole;
use App\Http\Resources\booking_holeResource;
use App\Http\Resources\servicesResource;
use App\Http\Resources\HoleResource;
use App\Http\Resources\Plane_HoleResource;
use App\Http\Traits\ApiResponseTrait;


class HoleServices {

    use ApiResponseTrait;
    function GetAllHoles(){

        $holes = HoleResource::collection(Hole::where('statuse','avaliable')->get()); 
        return $this->Response($holes,"all available hole successfully",200);
    }

//=============================================================================================================

    function GetAllHolePLans($id){
            
        $plans = Plane_HoleResource::collection(Plane_Hole::where('id_hole',$id)->get()); 
        return $this->Response($plans,"all plans for this hole successfully",200);
    }

//=============================================================================================================

    function GetAllHoleServices($id){
                
        $services = servicesResource::collection(services::where('id_hole',$id)->get()); 
        return $this->Response($services,"all services for this hole successfully",200);
    }

//=============================================================================================================

    function CheckOnBooking($id_hole,$date){
                    
        $check_on_booking = booking_hole::select('date')
                                        ->where('id_hole' , $id_hole)
                                        ->where('date','>=' , $date)
                                        ->orderBy('date')
                                        ->get();

        return $this->Response($check_on_booking,"all booking for this hole after this date successfully",200);
    }

//=============================================================================================================

    function BookingHole($id_hole, $id_plan,$request){
                        
        $dates = $request->input('dates');
        $services = $request->input('services');
        
        //هون لحتى يتحقق من التاريخ يلي جاية أذا هي الفاعة محجوزة بالاصل لهاد التاريخ يلي جاية
        $existingBookings = booking_hole::where('id_hole', $id_hole)
                                        ->whereIn('date', $dates)
                                        ->exists();
        if ($existingBookings) {
            return response()->json(['message' => 'One or more of the selected dates are already booked for this hole.'], 422);
        }



        //حساب كامل المبلغ من حجز قاعة و حجز الخدمات
        $plan_price = Plane_Hole::where('id_hole', $id_hole)->value('price');
        if (is_null($plan_price)) {
            return response()->json(['error' => 'Invalid hole or plan.'], 404);
        }
    

        
        //whereIn
        //هي بتروح بتتحقق من وجود مجموعة من القيم صمن العمود , يعني رح ترجع السجلات يلي بتحوي على مجموعة القيم هي ضمن هاد العمود
        $services_price = services::whereIn('id', $services)->sum('price'); 
        if (is_null($services_price)) {
            return response()->json(['error' => 'Invalid services.'], 404);
        }
    
        $total_price = $plan_price + $services_price;
    
        $bookings = [];
        foreach ($dates as $date) {
            $booking = booking_hole::create([
                'id_user' => Auth::id(),
                'id_hole' => $id_hole,
                'id_plan' => $id_plan,
                'date' => $date,
                'total_price' => $total_price,
            ]);
    
            $booking->services()->attach($services);
            
            $bookings[] =  new booking_holeResource($booking);
            
        }

        return $this->Response($bookings,"Booking created successfully",201);

    }
}