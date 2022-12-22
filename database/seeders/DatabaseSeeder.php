<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->unverified()->create([
            'first_name' => 'Sixtus',
            'last_name' => 'Agbo',
            'email' => 'mail.mirolic@gmail.com',
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
