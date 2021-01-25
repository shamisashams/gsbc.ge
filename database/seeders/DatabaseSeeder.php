<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key' => 'phone',
            ],
            [
                'key' => 'contact_email',
            ],
            [
                'key' => 'time',
            ],
            [
                'key' => 'facebook',
            ],
            [
                'key' => 'twitter',
            ],
            [
                'key' => 'behance',
            ],
            [
                'key' => 'instagram',
            ],
        ];

        Setting::insert($settings);

    }
}
