<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Claimlist;
class ClaimlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Claimlist::factory(5)->create();
    }
}
