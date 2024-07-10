<?php

namespace App\Http\Controllers\ApiControllers\Hole;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Services\HoleServices;


class servicesController extends Controller
{
    protected $HoleServices;

    public function __construct(HoleServices $HoleServices)
    {
        $this->HoleServices = $HoleServices;
    }

//=============================================================================================================

    public function all_services($id)
    {
        try {
    
            return $this->HoleServices->GetAllHoleServices($id);
    
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $this->customeResponse('something went wrong with fetching Hole services', 400);
        }
    }
}
