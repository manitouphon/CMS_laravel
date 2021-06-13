<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterNewUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Staff;
use App\Models\User;

class AuthController extends Controller
{
    public function login(UserRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$token = auth()->attempt($request->all())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $access_token = $user->createToken('my-app-token')->plainTextToken;
        return response()->json(['message' => "User successfully register", 'token' => $access_token, 'user' => $this->getProfile()]);
    }
    public function register(RegisterNewUserRequest $request)
    {

        $user = User::create(array_merge($request->validated(), ['password' => bcrypt($request->password)]));
        $stuff = Staff::create(array_merge($request->validated(), ['user_id' => $user->id]));

        return response()->json(['message' => "User successfully register"]);

    }
    public function profile()
    {
        return response()->json(['user' => $this->getProfile()]);
    }
    public function getProfile()
    {
        return auth()->user();
    }

}
