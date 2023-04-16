<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Traits\ApiResponseTrait;

class PermissionController extends Controller
{

    use ApiResponseTrait;

    public function index()
    {
        try {
            $lista = PermissionResource::collection(Permission::all());
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

    public function store(StorePermissionRequest $request)
    {
        try {
            $permission = Permission::create($request->validated());
            $objeto = new PermissionResource($permission);
            $data = [
                'objeto' =>  $objeto,
            ];
            $mensagem = 'Permissão cadastrada com sucesso';

            return $this->success($mensagem, $data);
        } catch (\Throwable $th) {
            //throw $th;
            $data = [ ];
            return $this->error($th, $data);
        }
    }

    public function show(Permission $permission)
    {
        try {
            $objeto = new PermissionResource($permission);
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

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        try {
            $permission->update($request->validated());
            $objeto = new PermissionResource($permission);
            $data = [
                'objeto' =>  $objeto,
            ];
            $mensagem = 'Permissão editada com sucesso';

            return $this->success($mensagem, $data);
        } catch (\Throwable $th) {
            //throw $th;
            $data = [ ];
            return $this->error($th, $data);
        }
    }

    public function destroy(Permission $permission)
    {
        try {
            $objeto = new PermissionResource($permission);
            $data = [
                'objeto' =>  $objeto,
            ];
            $mensagem = 'Permissão apagada com sucesso';

            $permission->delete();

            return $this->success($mensagem, $data);
        } catch (\Throwable $th) {
            //throw $th;
            $data = [ ];
            return $this->error($th, $data);
        }
    }
}
