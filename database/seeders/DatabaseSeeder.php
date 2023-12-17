<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Panier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Size::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            ShoeSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
        ]);

        $this->call([
            SizeSeeder::class,
        ]);

        $this->call([
            ShoeLinkSeeder::class,
        ]);

    }
}
