<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@email.com',
            'phone' => '017101000001',
            'image' => 'default.jpg',
            'gender' => '1',
            'status' => '1',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@email.com',
            'phone' => '017101000002',
            'image' => 'default.jpg',
            'gender' => '1',
            'status' => '1',
            'role' => 'user',
            'password' => bcrypt('password'),
        ]);
    }
}
