<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Samuel',
            'email' => 'samuelandika600@gmail.com',
            'city' => 'Bogor',
            'no_hp' => '081272929203',
            'password' => bcrypt('belitung123'),
            'role' => 'admin'
        ]);
    }
}
