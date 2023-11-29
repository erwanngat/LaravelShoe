<?php

namespace App\Livewire;

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
        if($this->shoes == null){
            $this->shoes = Shoe::all();
        }
    }

    public function addPanier($shoeId){
        $user = auth()->user();
        $panier = Panier::where('idUser', $user->id)
        ->where('idShoes', $shoeId)
        ->first();

        if ($panier) {
            $panier->number += 1;
            $panier->save();
        } else {
            $newPanier = new Panier();
            $newPanier->idUser = $user->id;
            $newPanier->idShoes = $shoeId;
            $newPanier->number = 1;
            $newPanier->save();
        }
    }

    public function toggleMenu(){
        if(!$this->menu){
            $this->menu = true;
        }else{
            $this->menu = false;
        }
    }

    public function sortAlpha(){
        $this->menu = false;
        $this->trie = 1;
    }

    public function sortCroissant(){
        $this->menu = false;
        $this->trie = 2;
    }

    public function sortDecroissant(){
        $this->menu = false;
        $this->trie = 3;
    }

    public function render()
    {
        if($this->trie == 1){
            $shoes = Shoe::orderBy('name', 'asc')->get();
            $this->shoes = $shoes;
        }
        elseif($this->trie == 2){
            $shoes = Shoe::orderBy('price', 'asc')->get();
            $this->shoes = $shoes;
        }
        elseif($this->trie == 3){
            $shoes = Shoe::orderBy('price', 'desc')->get();
            $this->shoes = $shoes;
        }
        
        $tot = 0;
        $panierItems = Panier::where('idUser', auth()->user()->id)->get();
        foreach ($panierItems as $item) {
            $number = $item->number;
            $tot += $number;
        }
        $this->count = $tot;

        return view('livewire.panierLivewire');
    }
}
