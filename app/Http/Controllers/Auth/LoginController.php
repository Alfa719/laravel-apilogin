<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credential = $request->only('username', 'password');

        if (Auth::attempt($credential)) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return response([
                'message' => 'success',
                'token' => $token,
                'access' => 'mahasiswa',
                'data' => $user
            ], Response::HTTP_OK);
        }
        elseif (Auth::guard('lecturer')->attempt($credential)) {
            $user = Auth::guard('lecturer')->user();
            $token = $user->createToken('token')->plainTextToken;

            return response([
                'message' => 'success',
                'token' => $token,
                'access' => 'dosen',
                'data' => $user
            ], Response::HTTP_OK);
        }
        else {
            return response([
                'message' => 'Invalid Credential'
            ], Response::HTTP_UNAUTHORIZED);
        }

    }
    public function user(Request $request)
    {
        return Auth::user();
    }
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response([
            'message'=> 'logout success',
        ], Response::HTTP_OK);
    }
}
