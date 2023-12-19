<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public function hasShoe(){
        return $this->belongsToMany(Shoe::class, ShoeLink::class );
    }

    public function getQuantity(){
        return $this->hasMany(ShoeLink::class, 'size_id');
    }
}
