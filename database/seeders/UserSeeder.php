<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role = Role::create(['name'=>'admin', 'display_name'=>'Administrator']);
        $agent = Role::create(['name'=>'agent', 'display_name'=>'Agent']);
        $driver_role = Role::create(['name'=>'driver', 'display_name'=>'Driver']);

        $admin = User::create([
            'name'=>'InstaTow',
            'username'=>'admin',
            'password'=>Hash::make('insta@2030')
        ]);

        $admin->assignRole($admin_role);

    }
}
