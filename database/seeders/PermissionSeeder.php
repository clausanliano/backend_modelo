<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $lista = ['user', 'role', 'permission'];
        $acoes = ['route','index', 'show', 'stores', 'update', 'delete'];

        Permission::factory()->create([
            'nome' => "login",
        ]);

        Permission::factory()->create([
            'nome' => "logout",
        ]);

        foreach ($lista as $item) {
            foreach ($acoes as $acao) {
                Permission::factory()->create([
                    'nome' => "$item-$acao",
                ]);
            }
        }
    }
}
