<?php

namespace App\Http\Controllers\ApiControllers\Hole;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Services\HoleServices;

class plan_holeController extends Controller
{
    protected $HoleServices;

    public function __construct(HoleServices $HoleServices)
    {
        $this->HoleServices = $HoleServices;
    }

//=============================================================================================================

    public function all_plans($id)
    {
        try {

            return $this->HoleServices->GetAllHolePLans($id);
    
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $this->customeResponse('something went wrong with fetching Hole plans', 400);
        }
        
    }
}
