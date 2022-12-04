<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Saule Super',
            'email' => 'super@saule.mx',
        ]);

        User::factory()->create([
            'name' => 'Saüle Admin',
            'email' => 'admin@saule.mx'
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'test@test.com',
        ]);
    }
}
