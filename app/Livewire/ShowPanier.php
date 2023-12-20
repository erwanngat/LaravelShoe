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
    public $menuSize;
    public $selectedShoe_id;
    public $shoeSizes;
    public $cartItems;

    public function mount($shoes)
    {
        $this->shoes = $shoes;
        foreach($this->shoes as $shoe){
            $this->total += $shoe->price;
        }

        $cartId = auth()->user()->cart->map->id->first();
        $cartItem = CartItem::where('cart_id', $cartId)
        ->get();
        $this->cartItems = $cartItem;
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

    public function toggleMenuSize($shoe_id){
        if (!$this->menuSize || $this->selectedShoe_id !== $shoe_id) {
            $this->menuSize = true;
            $this->selectedShoe_id = $shoe_id;
        } else {
            $this->menuSize = false;
        }

        $shoe = Shoe::find($shoe_id);
        $this->shoeSizes = $shoe->hasQuantity;
    }

    public function chooseSize($size, $shoe_id){
        $cartId = auth()->user()->cart->map->id->first();
        $cartItem = CartItem::where('cart_id', $cartId)
        ->where('shoe_id', $shoe_id)
        ->first();

        $cartItem->size = $size;
        $cartItem->save();

    }

    public function render()
    {
        return view('livewire.show-panier');
    }
}
