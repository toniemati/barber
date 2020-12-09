<?php

namespace Database\Seeders;

use App\Models\Cennik;
use App\Models\Fryzjer;
use App\Models\Message;
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

        //* FACTORY
        Reservation::factory(20)->create();
        Zabieg::factory(5)->create();
        Fryzjer::factory(3)->create();
        Cennik::factory(5)->create();
        Message::factory(5)->create();

        //* ADMIN USER
        $admin = [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('test1234'),
        ];

        User::create($admin);
    }
}
