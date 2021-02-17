<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Region};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = Region::first();
        User::factory()
                ->count(5)
                ->for($region)
                ->create();
    }
}
