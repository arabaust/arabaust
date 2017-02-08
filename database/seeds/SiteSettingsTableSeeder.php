<?php

use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings')->insert([
            'name' => 'AdminSide App',
            'email' => 'email@admin.com',
            'notification_email' => 'email@admin.com',
            'phone_1' => '0788702111',
            'fax' => ' ',
            'physical_address' => 'Jordan, Amman',
            'mailing_address' => 'Jordan, Amman',
            'country' => 'Jordan',
            'city' => 'Amman',
            'zip_code' => ' ',
            'updated_by' => 'master.admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
