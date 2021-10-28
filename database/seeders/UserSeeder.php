<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Administrator";
        $user->email = "admin@aconasonic.com";
        $user->password = Hash::make('admin1234');
        $user->role = "ADMIN";
        $user->save();

        $user = new User();
        $user->name = "Officer";
        $user->email = "officer@aconasonic.com";
        $user->password = Hash::make('officer1234');
        $user->role = "OFFICER";
        $user->save();

        
    }
}
