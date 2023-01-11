<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name'=>'Design'],
            ['name'=>'Consulting'],
            ['name'=>'SEO'],
            ['name'=>'Writing'],
            ['name'=>'Development'],
            ['name'=>'Reading'],
        ];

        Tag::insert($tags);

    }
}
