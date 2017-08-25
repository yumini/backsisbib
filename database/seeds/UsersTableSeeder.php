<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
         User::create([
        	'name' => 'Yumi Tominaga Garcia',
            'email' => 'ytominagag@gmail.com',
        	'password' => bcrypt('123456')
        ]);
    }
}
