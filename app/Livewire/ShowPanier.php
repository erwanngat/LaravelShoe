<?php

namespace App\Livewire;

use App\Models\Shoe;
use Livewire\Component;

class ShowPanier extends Component
{
    public $shoes;

    public function mount($shoes)
    {
        $this->shoes = $shoes;
    }

    public function removePanier($shoe){
        dd('test');
        $shoe->delete();
        $this->shoes = Shoe::all();
    }

    public function render()
    {
        return view('livewire.show-panier')->with('shoes', $this->shoes);
    }
}
