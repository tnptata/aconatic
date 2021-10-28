<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Warranty;
class WarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warranty::factory(5)->create();
    }
}
