<?php

namespace App\Livewire;

use App\Models\CartItem;
use App\Models\Shoe;
use App\Models\Panier;
use Livewire\Component;

class PanierLivewire extends Component
{
    public $menu = false;
    public $shoes;
    public $trie;
    public $count;

    public function mount()
    {
        if ($this->shoes == null) {
            $this->shoes = Shoe::all();
        }
    }

    public function addPanier($shoe_id)
    {
        $user = auth()->user();
        
        if ($user->cart->isEmpty()) {
            $newCart = new Panier();
            $newCart->user_id = $user->id;
            $newCart->save();

            $cart_id = $newCart->id;
        } else {
            $cart_id = $user->cart->first()->id;
        }

        $item = new CartItem();
        $item->cart_id = $cart_id;
        $item->shoe_id = $shoe_id;
        $item->size = null;
        $item->save();
    }

    public function toggleMenu()
    {
        $this->menu = !$this->menu;
    }

    public function sortAlpha()
    {
        $this->menu = false;
        $this->trie = 1;
    }

    public function sortCroissant()
    {
        $this->menu = false;
        $this->trie = 2;
    }

    public function sortDecroissant()
    {
        $this->menu = false;
        $this->trie = 3;
    }

    public function render()
    {
        $shoes = Shoe::query();

        if ($this->trie == 1) {
            $shoes = $shoes->orderBy('name', 'asc');
        } elseif ($this->trie == 2) {
            $shoes = $shoes->orderBy('price', 'asc');
        } elseif ($this->trie == 3) {
            $shoes = $shoes->orderBy('price', 'desc');
        }
        $this->shoes = $shoes->get();

        $this->count = auth()->user()->cartItem->count();

        return view('livewire.panierLivewire');
    }
}
