<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i < 11; $i++) {
            $user = User::factory()->create([
                'email' => "teste$i@teste.com",
            ]);

            $roles = Role::select('id')->take($i - 1)->get()->pluck('id');

            if ($i != 3) {
                $user->roles()->attach($roles);
            }else{
                $user->roles()->attach([2]);
            }

        }

        //return User::factory(10)->create();
    }
}
