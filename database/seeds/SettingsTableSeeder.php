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
        \App\Setting::create([
            'site_name' => "Kabir's Blog",
            'address' => 'Dhaka, Bangladesh',
            'contact_number' => '+880 1680246806',
            'contact_email' => 'ashrafkabir95@gmail.com'
        ]);
    }
}
