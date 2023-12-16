<?php

namespace App\Models;

use App\Models\Shoe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panier extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item(){
        return $this->hasMany(CartItem::class, 'cart_id');
    }    

    public function shoes(){
        return $this->hasManyThrough(Shoe::class, CartItem::class, 'cart_id' ,'id' ,'id', 'shoe_id');
    }    
}
