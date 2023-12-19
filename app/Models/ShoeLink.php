<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoeLink extends Model
{
    use HasFactory;

    protected $table = 'size_link';

    public function isSize(){
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function isShoe(){
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }

}
