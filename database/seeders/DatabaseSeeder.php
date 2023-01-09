<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->unverified()->create([
        //     'first_name' => 'Sixtus',
        //     'last_name' => 'Agbo',
        //     'email' => 'mail.mirolic@gmail.com',
        // ]);

        \App\Models\User::factory()->create([
            'first_name' => 'Sixtus',
            'last_name' => 'Agbo',
            'email' => 'mail.mirolic@gmail.com',
        ]);

        if (App::environment('local')) {
            \App\Models\User::factory(17)->create();
        }

        $this->call([
            SettingSeeder::class,
            CouponSeeder::class,
        ]);
    }
}
