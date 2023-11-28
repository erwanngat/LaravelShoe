<?php

namespace App\Livewire;

use App\Models\Shoe;
use App\Models\Panier;
use App\Models\User;
use Livewire\Component;

class ShowPanier extends Component
{
    public $shoes;

    public function mount($shoes)
    {
        $this->shoes = $shoes;

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

        // refresh panier user
        $this->shoes = Panier::where('idUser', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.show-panier');
    }
}
