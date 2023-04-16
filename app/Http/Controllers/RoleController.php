<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Traits\ApiResponseTrait;

class RoleController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $lista = RoleResource::collection(Role::all());
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


    public function store(StoreRoleRequest $request)
    {
        try {
            $permission = Role::create($request->validated());

            $objeto = new RoleResource($permission);
            $data = [
                'objeto' =>  $objeto,
            ];

            $mensagem = 'Regra cadastrada com sucesso';

            return $this->success($mensagem, $data);
        } catch (\Throwable $th) {
            //throw $th;
            $data = [ ];
            return $this->error($th, $data);
        }
    }


    public function show(Role $role)
    {
        try {
            $objeto = new RoleResource($role);
            $data = [
                'objeto' =>  $objeto,
            ];
            $mensagem = 'Consulta realizada com sucesso';

            return $this->success($mensagem, $data);
        } catch (\Throwable $th) {
            //throw $th;
            $data = [ ];
            return $this->error($th, $data);
        }
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {
            $role->update($request->validated());
            $objeto = new RoleResource($role);
            $data = [
                'objeto' =>  $objeto,
            ];
            $mensagem = 'Regra editada com sucesso';

            return $this->success($mensagem, $data);
        } catch (\Throwable $th) {
            //throw $th;
            $data = [ ];
            return $this->error($th, $data);
        }
    }


    public function destroy(Role $role)
    {
        try {
            $objeto = new RoleResource($role);
            $data = [
                'objeto' =>  $objeto,
            ];
            $mensagem = 'Regra apagada com sucesso';

            $role->delete();

            return $this->success($mensagem, $data);
        } catch (\Throwable $th) {
            //throw $th;
            $data = [ ];
            return $this->error($th, $data);
        }
    }
}
