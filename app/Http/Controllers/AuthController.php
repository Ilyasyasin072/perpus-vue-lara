<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth.api', ['except' => 'login', 'register']);
    }

    public function login()
    {
        // $credentials = request()->only(['email', 'password']);

        // var_dump($credentials); die;

        // if (! $token = auth()->attempt($credentials)) {
        //     return response()->json([
        //         'error' => 'Unauthorized'
        //     ], 400);
        // }

        // return $this->respondWithToken($token);
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // var_dump($validator); die;

        if($validator->fails()) {
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

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
