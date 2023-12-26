<?php

namespace App\Livewire;

use App\Models\Shoe;
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

    public function mount($shoes){
        $this->shoes = $shoes;
        $this->total = collect($this->shoes)->sum('price');
        $this->cartItems = CartItem::where('cart_id', auth()->user()->cart->map->id->first())->get();
    }

    public function removePanier($idShoe){
        $cartId = auth()->user()->cart->map->id->first();
        $cartItem = CartItem::where('cart_id', $cartId)
        ->where('shoe_id', $idShoe)
        ->first();

        if ($cartItem) {
            $cartItem->delete();
            $this->shoes = auth()->user()->cart->flatMap->shoes;
            $this->total = collect($this->shoes)->sum('price');
        }
    }

    public function toggleMenuSize($shoe_id){
        $shouldToggle = (!$this->menuSize || $this->selectedShoe_id !== $shoe_id);
        $this->menuSize = $shouldToggle;
        $this->selectedShoe_id = $shouldToggle ? $shoe_id : null;

        if ($shouldToggle) {
            $shoe = Shoe::find($shoe_id);
            $this->shoeSizes = $shoe->hasQuantity;
        }
    }

    public function chooseSize($size, $shoe_id){
        $cartItem = auth()->user()->cartItem
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
