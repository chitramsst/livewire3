<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterSettings;


class MasterControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = new MasterSettings();
        $site = $settings->siteData();
        $site['default_application_name'] = "Livewire Skeleten Project";
        $site['default_email'] = "test@test.com";
        $site['default_decimal_digits'] = "2";
        $site['default_currency_location'] = "1";
        $site['default_contact_number'] = "123456";
        $site['default_address'] = "test Address";
        $site['default_currency_symbol'] = "$";
        
        foreach ($site as $key => $value) {
            MasterSettings::updateOrCreate(['master_title' => $key], ['master_value' => $value]);
        }
    }
}
