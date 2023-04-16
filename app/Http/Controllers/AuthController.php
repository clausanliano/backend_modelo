<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = new UserResource(Auth::user());
            $abilities = $user->permissions()->pluck('nome')->toArray();
            $token = Auth::user()->createToken('API_TOKEN', $abilities)->plainTextToken;

            return response()->json([
                'message' => 'Login realizado com sucesso!!!',
                'token' => $token,
                'ususario' => $user,
                'abilities' => $abilities,
            ]);
        }else{
        throw ValidationException::withMessages([
            'login' => ['As credenciais fornecidas estão incorretas.'],
        ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }

}
