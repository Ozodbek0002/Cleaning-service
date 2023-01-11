<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'Post 1',
            'short_content' => 'Short content 1',
            'content' => 'Content 1',
            'photo' => null,
        ]);

       Post::factory()->count(30)->create();
    }
}
