<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('PermissionRoleTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('SiteAboutTableSeeder');
        $this->call('SiteSettingsTableSeeder');
        $this->call('SiteTermsTableSeeder');
        $this->call('UsersTableSeeder');

        $this->call('DbSeed');

        Model::reguard();
    }
}
