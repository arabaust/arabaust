<?php

use Illuminate\Database\Seeder;

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
            'username' => 'master.admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('123456'),
            'first_name' => 'admin',
            'last_name' => 'admin',
            'role_id' => '1',
            'status' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
