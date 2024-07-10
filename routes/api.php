<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiControllers\Hole\HoleController;
use App\Http\Controllers\ApiControllers\Hole\servicesController;
use App\Http\Controllers\ApiControllers\Hole\plan_holeController;
use App\Http\Controllers\ApiControllers\Hole\Booking_holeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Authentication ============================================================================
Route::post('/signup_company', [AuthController::class, 'sign_up_company']);
Route::post('/signup_freelancer', [AuthController::class, 'sign_up_freelancer']);

Route::post('/login', [AuthController::class, 'login']);


//===========================================================================================================
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

     //Holes==============================================================================================
    Route::get('/all_holes', [HoleController::class, 'all_holes']);
    Route::get('/all_plans/{id}', [plan_holeController::class, 'all_plans']);
    Route::get('/all_services/{id}', [servicesController::class, 'all_services']);
    Route::get('/check_on_booking/{id_hole}/{date}', [Booking_holeController::class, 'check_on_booking']);
    Route::post('/booking_hole/{id_hole}/{id_plan}', [Booking_holeController::class, 'booking_hole']);

    //WorkSpace==============================================================================================
    // Route::get('/all_workspace', [WorkspaceController::class, 'workspace_view_all']);
    // Route::get('/all_plans/{id}', [WorkspaceController::class, 'plan_view_all']);
    // Route::post('/booking/{id_wokspace}/{id_plan}', [WorkspaceController::class, 'booking']);

    //credits===============================================================================================
    // Route::post('/charge_credits',[CreditController::class , 'charge_credits']);
    // Route::get('/all_own_credits/{id}',[CreditController::class , 'all_own_credits']);


});
    
