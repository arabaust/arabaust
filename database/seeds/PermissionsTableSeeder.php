<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'permission_title' => 'Dashboard',
            'permission_title_ar' => 'لوحة التحكم',
            'permission_slug' => 'dashboard',
            'permission_description' => 'can access the dashboard'
        ]);

        DB::table('permissions')->insert([
            'permission_title' => 'Profile',
            'permission_title_ar' => 'الملف الشخصي',
            'permission_slug' => 'profile',
            'permission_description' => 'Edit profile'
        ]);

        DB::table('permissions')->insert([
            'permission_title' => 'Settings',
            'permission_title_ar' => 'الإعدادات',
            'permission_slug' => 'settings',
            'permission_description' => 'CRUD site settings'
        ]);

        DB::table('permissions')->insert([
            'permission_title' => 'Users',
            'permission_title_ar' => 'المستخدمين',
            'permission_slug' => 'users',
            'permission_description' => 'CRUD Users'
        ]);

        DB::table('permissions')->insert([
            'permission_title' => 'Positions & Permissions',
            'permission_title_ar' => 'الصلاحيات',
            'permission_slug' => 'roles',
            'permission_description' => 'CRUD FTV | Position & Permissions'
        ]);

        DB::table('permissions')->insert([
            'permission_title' => 'Clients',
            'permission_title_ar' => 'أعضاء التطبيق',
            'permission_slug' => 'clients',
            'permission_description' => 'CRUD Clients'
        ]);

        DB::table('permissions')->insert([
            'permission_title'  => 'Pages',
            'permission_title_ar' => 'الصفحات',
            'permission_slug'   => 'pages',
            'permission_description' => 'CRUD Reports'
        ]);

        DB::table('permissions')->insert([
            'permission_title' => 'Products',
            'permission_title_ar' => 'المنتجات',
            'permission_slug' => 'products',
            'permission_description' => 'CRUD Products'
        ]);

        DB::table('permissions')->insert([
            'permission_title' => 'News',
            'permission_title_ar' => 'الاخبار',
            'permission_slug' => 'news',
            'permission_description' => 'CRUD News'
        ]);

        DB::table('permissions')->insert([
            'permission_title'  => 'contactus',
            'permission_title_ar' => 'تواصل معنا',
            'permission_slug'   => 'contactus',
            'permission_description' => 'CRUD contactus'
        ]);


        DB::table('permissions')->insert([
            'permission_title'  => 'aboutus',
            'permission_title_ar' => 'معلومات عنا',
            'permission_slug'   => 'aboutus',
            'permission_description' => 'CRUD aboutus'
        ]);

        DB::table('permissions')->insert([
            'permission_title'  => 'media',
            'permission_title_ar' => 'الاعلام',
            'permission_slug'   => 'media',
            'permission_description' => 'CRUD media'
        ]);

        DB::table('permissions')->insert([
            'permission_title'    => 'address',
            'permission_title_ar' => 'العنوان',
            'permission_slug'     => 'address',
            'permission_description' => 'CRUD address'
        ]);
        
        DB::table('permissions')->insert([
            'permission_title'  => 'articles',
            'permission_title_ar' => 'المقالات',
            'permission_slug'   => 'articles',
            'permission_description' => 'CRUD articles'
        ]);

        DB::table('permissions')->insert([
            'permission_title'  => 'categories',
            'permission_title_ar' => 'الفئات',
            'permission_slug'   => 'categories',
            'permission_description' => 'CRUD categories'
        ]);
        
    
        

    }
}
