<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use Database\Factories\CommentFactory;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::query()->count())
            Video::factory()
                ->count(15)
                ->has(Comment::factory()->count(2))
                ->create();
    }
}
