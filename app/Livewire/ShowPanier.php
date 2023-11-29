<?php

namespace App\Livewire;

use App\Models\Shoe;
use App\Models\Panier;
use App\Models\User;
use Livewire\Component;

class ShowPanier extends Component
{
    public $shoes;
    public $total;

    public function mount($shoes)
    {
        $this->shoes = $shoes;
        foreach($this->shoes as $shoe){
            $this->total += $shoe->price * $shoe->panier->where('idUser', auth()->user()->id)->first()->number;
        }
    }

    public function removePanier($idShoe){
        $panier = Panier::where('idUser', auth()->user()->id)
        ->where('idShoes', $idShoe)
        ->first();

        if ($panier && $panier->number > 1) {
            $panier->decrement('number');
        } else if ($panier) {
            $panier->delete();
        }
        $this->shoes = Panier::where('idUser', auth()->user()->id)->get()->map->shoe;
        $shoePrice = Shoe::where('id', $idShoe)->value('price');
        $this->total -= $shoePrice;
    }

    public function render()
    {
        return view('livewire.show-panier');
    }
}
