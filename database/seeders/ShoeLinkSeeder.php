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
        for($ii = 1; $ii <=10; $ii++){
            for($i = 1; $i<= 15; $i++ ){
            $l = new ShoeLink();
                $l->shoe_id = $ii;
                $l->size_id = $i;
                $l->quantity = fake()->numberBetween(0, 10);
                $l->save();
            }
        }
    }
}
