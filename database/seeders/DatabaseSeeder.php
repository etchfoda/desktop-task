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
    }
}
