<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_title' => 'Admin',
            'status' => '1',
            'description' => 'admin',
            'created_by' => 'admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('roles')->insert([
            'role_title' => 'User',
            'status' => '1',
            'description' => 'customer',
            'created_by' => 'admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
