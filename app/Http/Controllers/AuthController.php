<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth.api', ['except' => 'login', 'register']);
    }

    public function login()
    {
        // try {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $credentials['email'])->get();
        // var_dump(); die;
        return $this->respondWithToken($token, $user[0]->name);
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return response()->json(['error'], 401);
        // }
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // var_dump($validator); die;

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ]);
    }

    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => $user,
        ]);
    }


    public function getUser($token = false)
    {
        try {
            $user = JWTAuth::user();
            if($user) {
                return response()->json(compact('token', 'user'));
            } else {
                return response()->json(['status' => 'error'], 500);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}
