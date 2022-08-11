<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create(
            [
                'email' => 'super@gmail.com',
                'name' => 'admin',
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Role::create(
            [
                'name' => 'super-admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        $superAdmin->assignRole('super-admin');
    }
}
