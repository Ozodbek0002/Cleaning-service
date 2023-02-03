<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => Hash::make('secret'),
            'photo'=> null,
        ]);

        $user->roles()->attach([1,2]);


        $user2 = DB::table('users')->insert([
            'name' => 'Boqqi',
            'email' => 'boqqi@gmail.com',
            'password' => Hash::make('secret'),
            'photo'=> null,
        ]);

        $user2->roles()->attach([3]);

    }
}
