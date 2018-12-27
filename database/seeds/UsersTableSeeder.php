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
        // admin
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'type' => User::ADMIN_TYPE,
        ]);

        // default user account
        DB::table('users')->insert([
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'type' => User::DEFAULT_TYPE,
        ]);
    }
}
