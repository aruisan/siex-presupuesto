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
            'name' => 'oscar',
            'email' => 'oskrjag@gmail.com',
            'password' => bcrypt('123456789'),
            'dependencia_id' => 1,
            'cdp1' => 1,
            'cdp2' => 0
        ]);


        User::create([
            'name' => 'pepe',
            'email' => 'pepe@admin.com',
            'password' => bcrypt('123456789'),
            'dependencia_id' => 2,
            'cdp1' => 0,
            'cdp2' => 0
        ]);
    }
}
