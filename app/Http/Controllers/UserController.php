<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $dados = $request->validated();
        $dados['password'] = Hash::make($dados['password']);

        $user = new UserResource(User::create($dados));

        return response()->json([
            'mensage' => 'Usuário Criado com Sucesso!!',
            'user'  =>  $user,
        ]);
    }

}
