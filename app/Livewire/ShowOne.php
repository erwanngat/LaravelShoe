<?php

namespace App\Livewire;

use App\Models\Panier;
use Livewire\Component;
use App\Models\CartItem;

class ShowOne extends Component
{
    public $shoe;
    public $currentSize;
    public $menuCart = false;
    public $selectedItem;

    public function appearAddCart($size, $shoeLink_id){
        if(!$this->menuCart || $this->selectedItem != $shoeLink_id){
            $this->menuCart = true;
            $this->currentSize = $size;
            $this->selectedItem = $shoeLink_id;
        } else{
            $this->selectedItem = null;
            $this->menuCart = false;
        }
    }

    public function addToCart(){
        if (auth()->user()->cart->isEmpty()) {
            $newCart = new Panier();
            $newCart->user_id = auth()->user()->id;
            $newCart->save();
            $cart_id = $newCart->id;
        } else {
            $cart_id = auth()->user()->cart->first()->id;
        }

        $item = new CartItem();
        $item->cart_id = $cart_id;
        $item->shoe_id = $this->shoe->id;
        $item->size = $this->currentSize;
        $item->save();

        return redirect('panier');
    }
    public function render()
    {
        return view('livewire.show-one');
    }
}
