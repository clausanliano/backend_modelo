<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $lista = UserResource::collection(User::all());
            $data = [
                'lista' =>  $lista,
            ];
            $mensagem = 'Consulta realizada com sucesso';

            return $this->success($mensagem, $data);
        } catch (\Throwable $th) {
            //throw $th;
            $data = [ ];
            return $this->error($th, $data);
        }
    }


    public function register(UserRequest $request)
    {
        try {
            $dados = $request->validated();
            $dados['password'] = Hash::make($dados['password']);

            $user = new UserResource(User::create($dados));
            $data = [
                'objeto' =>  $user,
            ];
            $mensagem = 'Usuário Criado com Sucesso!!';

            return $this->success($mensagem, $data);
        } catch (\Throwable $th) {
            //throw $th;
            $data = [ ];
            return $this->error($th, $data);
        }

    }

}
