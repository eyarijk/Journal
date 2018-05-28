<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
