<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@localhost',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);
        User::query()->create([
            'name' => 'Test',
            'email' => 'test@localhost',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);
        $this->call([
            VideoSeeder::class,
            VoiceSeeder::class,
        ]);
    }
}
