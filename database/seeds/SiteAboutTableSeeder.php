<?php

use Illuminate\Database\Seeder;

class SiteAboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_about')->insert([
            'en_about' => 'Please fill About AdminSide Application...',
            'ar_about' => '...يرجى ملء معلومات التطبيق',
            'updated_by' => 'master.admin',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
