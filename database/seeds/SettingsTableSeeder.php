<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name'=>'Personal Blog',
            'contact_number'=>'0123456789',
            'contact_email'=>'info@blog.com',
            'address'=>'Dhaka, Bangladesh',
        ]);
    }
}
