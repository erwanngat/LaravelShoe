<?php

namespace Database\Seeders;

use App\Models\ShoeLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoeLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i = 0; $i<50; $i++){
            $l = new ShoeLink();
            $l->shoe_id = fake()->numberBetween(1, 10);
            $l->size_id = fake()->numberBetween(1, 15);
            $l->save();
        }
    }
}
