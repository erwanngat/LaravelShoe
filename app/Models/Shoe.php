<?php

namespace App\Models;

use App\Models\Panier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shoe extends Model
{
    use HasFactory;

    protected $table = 'shoes';

    public function panier()
    {
        return $this->hasMany(Panier::class, 'idShoes');
    }
}
