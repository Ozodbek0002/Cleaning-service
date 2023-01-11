<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Web Development',
//            'slug' => 'web-development',
        ]);
        Category::create([
            'name' => 'Web Design',
//            'slug' => 'web-design',
        ]);
        Category::create([
            'name' => 'Online marketing',
//            'slug' => 'programming',
        ]);
        Category::create([
            'name' => 'Keyword Research',
//            'slug' => 'seo',
        ]);
        Category::create([
            'name' => 'Email Marketing',
//            'slug' => 'marketing',
        ]);


    }
}
