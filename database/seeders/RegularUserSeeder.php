<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RegularUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'regular@example.com'],
            [
                'name'     => 'Regular User',
                'password' => Hash::make('password123'),
                'role'     => 'user',
                'username' => 'regularuser123',
            ]
        );
    }
}
