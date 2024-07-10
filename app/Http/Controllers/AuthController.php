<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Resources\signupResource;
use App\Http\Requests\signup_companyRequest;
use App\Http\Requests\signup_freelancerRequest;



class AuthController extends Controller
{

    //لحتى اقدر استخدم توابع ال trait
    use ApiResponseTrait;
    
    /*
    هلئ هوت هي طريقة تانية مثلا لحتى خلي تابع معين ما ينطلب إذا مافي تسجيل دخول أول
    أو بحطو عند الراوت هنيك للميدلويير عند الراوتات
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    */
//======================================================================================================================================
    public function sign_up_company(signup_companyRequest $request){

        $data = $request->validated();

        Company::create([
            'company_name' => $data['company_name'],
            'bio'=>$data['bio'],
            'wdate'=>$data['wdate'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address'=>$data['address'],
            'password'=>bcrypt($data['password']),
            'license_number'=>$data['license_number'],
        ]);

        $company = User::create([
            'name' => $data['company_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role'=>'copmany',
        ]);

        //The under code will create a token that will be sent along with every request to a protected route.
        $token = $company->createToken('apiToken')->plainTextToken;

        return $this->apiResponse(new signupResource($company),$token,"create company account successfully - registered successfully",201);
        

    }

//======================================================================================================================================
public function sign_up_freelancer(signup_freelancerRequest $request){

    $data = $request->validated();

    Freelancer::create([
        'freelancer_name' => $data['freelancer_name'],
        'study'=>$data['study'],
        'phone' => $data['phone'],
        'email'=>$data['email'],
        'brithdate'=>$data['brithdate'],
        'address'=>$data['address'],
        'experience'=>$data['experience'],
        'password'=>bcrypt($data['password']),
    ]);

    $freelancer = User::create([
        'name' => $data['freelancer_name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'role'=>'freelancer',
    ]);

    //The under code will create a token that will be sent along with every request to a protected route.
    $token = $freelancer->createToken('apiToken')->plainTextToken;

    return $this->apiResponse(new signupResource($freelancer),$token,"create freelancer account successfully - registered successfully",201);
    

}
//======================================================================================================================================
    public function login(loginRequest $request)
    {
        
        $data = $request->validated();

        // Define a $user variable that contains the user with the given email.
        // Check if the $user is registered and return 'msg' => 'incorrect username or password' with a 401 status code if it isn't.

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'msg' => 'incorrect username or password'
            ], 401);
        }

        //The under code generates a token that will be used to log in.
        $token = $user->createToken('apiToken')->plainTextToken;
        
        return $this->apiResponse(null,$token,"login successfully",200);

    }

//======================================================================================================================================
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return ['message' => 'user logged out'];
    }
}
