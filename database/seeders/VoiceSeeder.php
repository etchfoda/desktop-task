<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Voice;
use Illuminate\Database\Seeder;

class VoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::query()->count())
            Voice::factory()
                ->count(15)
                ->has(Comment::factory()->count(2))
                ->create();
    }
}
