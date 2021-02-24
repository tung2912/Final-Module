<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except' => ['login', 'register']]);
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        $token_validity = 24 * 60;
        auth('api')->factory()->setTTL($token_validity);

        if(!$token = auth('api')->attempt($validator->validated())) {
            return response()->json(['error'=>'Email or password is invalid'],401);
        }

        return $this->responseWithToken($token);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,200',
            'email' => 'required|email|unique:owners',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'phone' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([$validator -> errors()],422);
        }

        $owner = Owner::create(array_merge(
            $validator->validated(),['password' => bcrypt($request->password)]
        ));
        return response()->json(['message'=> 'user created successfully', 'owner' => $owner], JsonResponse::HTTP_CREATED);
    }

    public function logout() {
        $this->guard()->logout();
        return response()->json(['message' => 'Logout successfully']);
    }

    public function profile() {
        return response()->json(auth('api')->owner());
    }

    public function refresh() {
        return $this->responseWithToken(auth('api')->refresh());
    }

    protected function guard() {
        return Auth::guard();
    }

    protected function responseWithToken($token) {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'token_validity' => auth('api')->factory()->getTTL()*60,
            'owner' => auth('api')->owner()
        ]);
    }
}
