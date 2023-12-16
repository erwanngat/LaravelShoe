<?php

namespace App\Livewire;

use App\Models\Shoe;
use App\Models\User;
use App\Models\Panier;
use Livewire\Component;
use App\Models\CartItem;

class ShowPanier extends Component
{
    public $shoes;
    public $total;

    public function mount($shoes)
    {
        $this->shoes = $shoes;
        foreach($this->shoes as $shoe){
            $this->total += $shoe->price;
        }
    }

    public function removePanier($idShoe){

        $cartId = auth()->user()->cart->map->id->first();
        $cartItem = CartItem::where('cart_id', $cartId)
        ->where('shoe_id', $idShoe)
        ->first();
        
        if ($cartItem) {
            $cartItem->delete();
            
            $this->shoes = auth()->user()->cart->flatMap->shoes;
    
            $this->total = 0;
            foreach ($this->shoes as $shoe) {
                $this->total += $shoe->price;
            }
        }   
    }

    public function render()
    {
        return view('livewire.show-panier');
    }
}
