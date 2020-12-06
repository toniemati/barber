<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Zabieg;
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
        // \App\Models\User::factory(10)->create();

        //* Reservation factory
        Reservation::factory(10)->create();
        Zabieg::factory(5)->create();

        $admin = [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('test1234'),
        ];

        User::create($admin);
    }
}
