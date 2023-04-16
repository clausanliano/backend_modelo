<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        //Administrador
        $role = Role::factory()->create([
            'nome'  => 'administrador',
        ]);

        $permissions = Permission::select('id')->get()->pluck('id');
        $role->permissions()->attach($permissions);

        //Usuário
        $role = Role::factory()->create([
            'nome'  => 'usuario',
        ]);

        $permissions = Permission::select('id')
                        ->where('nome','login')
                        ->orWhere('nome', 'logout')
                        ->get()
                        ->pluck('id');
        $role->permissions()->attach($permissions);
    }
}
