<?php

namespace App\Livewire;

use App\Models\Shoe;
use App\Models\Panier;
use Livewire\Component;

class PanierLivewire extends Component
{

    public function addPanier($shoeId){
        dd('test');

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

    public function test(){
        dd('test');
    }

    public function render()
    {
        $shoes = Shoe::all();
        return view('livewire.panierLivewire', ['shoes' => $shoes]);  
    }
}
