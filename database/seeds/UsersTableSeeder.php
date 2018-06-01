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
        User::create([
            'name' => 'Suman Bhattarai',
            'email' => 'smnbhattarai4@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('password')
        ]);
    }
}
