<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'andrejshaev',
            'email' => 'andrejshaev@gmail.com',
            'password' => Hash::make('andrejshaev'),
            'role_id' => 1
        ]);
    }
}
