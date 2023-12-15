<?php

namespace Database\Seeders;

use App\Models\Shoe;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $s = new Shoe();
        $s->name = "Nike";
        $s->price = 70;
        $s->image = "nike.jpg";
        $s->save();

        $s = new Shoe();
        $s->name = "Jordan";
        $s->price = 100;
        $s->image = "jordan.jpg";
        $s->save();

        $s = new Shoe();
        $s->name = "Running";
        $s->price = 150;
        $s->image = "running.jpg";
        $s->save();

        $s = new Shoe();
        $s->name = "Football";
        $s->price = 199.99;
        $s->image = "football.jpg";
        $s->save();

        $s = new Shoe();
        $s->name = "Basketball";
        $s->price = 120;
        $s->image = "basketball.jpg";
        $s->save();

        $s = new Shoe();
        $s->name = "Femme";
        $s->price = 90;
        $s->image = "femme.jpg";
        $s->save();

        $s = new Shoe();
        $s->name = "Original";
        $s->price = 130;
        $s->image = "original.jpg";
        $s->save();

        $s = new Shoe();
        $s->name = "Claquette";
        $s->price = 40;
        $s->image = "claquette.jpg";
        $s->save();

        $s = new Shoe();
        $s->name = "Air max blanche";
        $s->price = 139;
        $s->image = "airmax.jpg";
        $s->save();

        $s = new Shoe();
        $s->name = "Air force";
        $s->price = 99.99;
        $s->image = "airforce.jpg";
        $s->save();
    }
}
