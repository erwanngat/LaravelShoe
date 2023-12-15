<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $s = new Size();
        $s->size = 34;
        $s->save();

        $s = new Size();
        $s->size = 35;
        $s->save();

        $s = new Size();
        $s->size = 36;
        $s->save();

        $s = new Size();
        $s->size = 37;
        $s->save();

        $s = new Size();
        $s->size = 38;
        $s->save();

        $s = new Size();
        $s->size = 39;
        $s->save();

        $s = new Size();
        $s->size = 40;
        $s->save();

        $s = new Size();
        $s->size = 41;
        $s->save();

        $s = new Size();
        $s->size = 42;
        $s->save();

        $s = new Size();
        $s->size = 43;
        $s->save();

        $s = new Size();
        $s->size = 44;
        $s->save();

        $s = new Size();
        $s->size = 45;
        $s->save();

        $s = new Size();
        $s->size = 46;
        $s->save();

        $s = new Size();
        $s->size = 47;
        $s->save();

        $s = new Size();
        $s->size = 48;
        $s->save();
    }
}
