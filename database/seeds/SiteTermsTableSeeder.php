<?php

use Illuminate\Database\Seeder;

class SiteTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_terms')->insert([
            'terms' => 'Please fill the Terms & condition...',
            'updated_by' => 'master.admin',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
