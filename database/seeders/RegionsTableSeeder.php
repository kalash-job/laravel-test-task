<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            'Республика Адыгея',
            'Республика Алтай',
            'Республика Башкортостан',
            'Республика Бурятия',
            'Республика Дагестан',
            'Москва',
        ];
        foreach ($regions as $regionValue) {
            Region::create(['name' => $regionValue]);
        }
    }
}
