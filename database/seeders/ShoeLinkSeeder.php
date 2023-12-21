<?php

namespace Database\Seeders;

use App\Models\Shoe;
use App\Models\Size;
use App\Models\ShoeLink;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShoeLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shoes = Shoe::all();
        $sizes = Size::all();

        foreach($shoes as $shoe){
            foreach($sizes as $size){
                $l = new ShoeLink();
                $l->shoe_id = $shoe->id;
                $l->size_id = $size->id;
                $l->quantity = fake()->numberBetween(0, 10);
                $l->save();
            }
        }
    }
}
