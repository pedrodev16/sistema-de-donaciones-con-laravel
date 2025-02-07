<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //registro de usuario administrador
        $admin = new \App\Models\User();
        $admin->name = 'Admin';
        $admin->email = 'Admin@admin.com';
        $admin->password = bcrypt('admin1234');
        $admin->save();

    }
}
