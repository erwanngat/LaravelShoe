<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $u = new User();
        $u->name = "admin";
        $u->email = "admin@admin.fr";
        $u->permissions = 1;
        $u->password = hash::make('admin');
        $u->save();

        $this->call([
            ShoeSeeder::class,
        ]);
    }
}
