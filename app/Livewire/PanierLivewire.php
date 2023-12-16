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
            $newCart->user_id = auth()->user()->id;
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
        if (!$this->menu) {
            $this->menu = true;
        } else {
            $this->menu = false;
        }
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
        if ($this->trie == 1) {
            $shoes = Shoe::orderBy('name', 'asc')->get();
            $this->shoes = $shoes;
        } elseif ($this->trie == 2) {
            $shoes = Shoe::orderBy('price', 'asc')->get();
            $this->shoes = $shoes;
        } elseif ($this->trie == 3) {
            $shoes = Shoe::orderBy('price', 'desc')->get();
            $this->shoes = $shoes;
        }

        $tot = 0;
        $panierItems = auth()->user()->cartItem;
        foreach ($panierItems as $item) {
            $number = $item->number;
            $tot += $number;
        }
        $this->count = $tot;
        $this->count = auth()->user()->cartItem->count();

        return view('livewire.panierLivewire');
    }
}
