<?php

namespace App\Models;

use App\Models\Panier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shoe extends Model
{
    use HasFactory;

    protected $table = 'shoes';

    public function inCart()
    {
        return $this->belongsToMany(Panier::class, CartItem::class, 'shoe_id', 'cart_id', 'id', 'id');
    }

    public function hasSize()
    {
        return $this->belongsToMany(size::class, ShoeLink::class);
    }

    public function hasQuantity(){
        return $this->hasMany(ShoeLink::class);
    }



}
