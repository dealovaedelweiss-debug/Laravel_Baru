<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'email|required',
                'password' => 'min:8|required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 422);
            }
            $credentials = $request->only('email', 'password');
            if (! Auth::attempt($credentials)) {
                return response()->json(['status' => false, 'message' => 'Invalid credential'], 400);
            }
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Login succes',
                'token' => $token,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function me()
    {
        return response()->json([
            'user' => auth('sanctum')->user(),
        ]);
    }
}
