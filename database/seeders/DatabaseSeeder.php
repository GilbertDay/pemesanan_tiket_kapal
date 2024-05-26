<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'	=> 'Mayu',
            'email'	=> 'srimayufara@gmail.com',
            'no_telp' => '085217331557',
            'password'	=> bcrypt('12345678'),
            'role' => 'admin'
    ]);
    }
}
