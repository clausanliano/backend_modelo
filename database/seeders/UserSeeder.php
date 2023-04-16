<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i < 11; $i++) {
            User::factory()->create([
                'email' => "teste$i@teste.com",
            ]);
        }

        //return User::factory(10)->create();
    }
}
