<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use App\Models\Using;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        User::factory(10)->create();
        Thing::factory(100)->create();
        Place::factory(40)->create();
        Using::factory(50)->create();
    }
}
