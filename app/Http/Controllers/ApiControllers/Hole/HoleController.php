<?php

namespace App\Http\Controllers\ApiControllers\Hole;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Services\HoleServices;

class HoleController extends Controller
{
    protected $HoleServices;

    public function __construct(HoleServices $HoleServices)
    {
        $this->HoleServices = $HoleServices;
    }
    
//=============================================================================================================

    public function all_holes()
    {
        try {
    
            return $this->HoleServices->GetAllHoles();
    
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $this->customeResponse('something went wrong with fetching Holes', 400);
        }
    }
}
