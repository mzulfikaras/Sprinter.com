<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
                'name' => 'Shanaz',
                'email' => 'admin1@email.com',
                'password' =>  bcrypt('admin1'),
            ],
            
            [
                'name' => 'Rahmat Ramadhan',
                'email' => 'admin2@email.com',
                'password' =>  bcrypt('admin2'),
            ],

            [
                'name' => 'Vividha',
                'email' => 'admin3@email.com',
                'password' =>  bcrypt('admin3'),
            ],

        ]);
    }
}
