<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $request['password'] = Hash::make($request->password);

        $user = User::create($request->validated());

        return response()->json([
            'mensage' => 'Usuário Criado com Sucesso!!',
            'user'  =>  $user,
        ]);
    }

}
