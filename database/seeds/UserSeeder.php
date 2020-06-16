<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rama Hisyam Alchorii',
            'email' => 'ramahisyam1@gmail.com',
            'agency' => 'PENS',
            'city' => 'Surabaya',
            'password' => bcrypt('123456789')
        ]);
    }
}
