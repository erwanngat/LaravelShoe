<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u = new User();
        $u->name = "NormalUser";
        $u->email = "test@test.com";
        $u->permissions = 0;
        $u->password = "password";
        $u->save();

        $u = new User();
        $u->name = "AdminUser";
        $u->email = "admin@admin.com";
        $u->permissions = 1;
        $u->password = "password";
        $u->save();
    }
}
