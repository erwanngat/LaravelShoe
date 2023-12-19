<?php

namespace App\Livewire;

use App\Models\ShoeLink;
use Livewire\Component;

class Stock extends Component
{
    public $stocks;
    public $menu = false;
    public $addStockField = false;
    public $removeStockField = false;
    public $selectedStock_id;
    public $stockValue;

    public function toggleMenuAction($stock_id){
        if (!$this->menu || $this->selectedStock_id !== $stock_id) {
            $this->menu = true;
            $this->selectedStock_id = $stock_id;
        } else {
            $this->menu = false;
        }
    }

    public function toggleAddStockField($stock_id){
        if (!$this->addStockField || $this->selectedStock_id !== $stock_id) {
            $this->addStockField = true;
            $this->selectedStock_id = $stock_id;
        } else {
            $this->addStockField = false;
        }
    }

    public function toggleRemoveStockField($stock_id){
        if (!$this->removeStockField || $this->selectedStock_id !== $stock_id) {
            $this->removeStockField = true;
            $this->selectedStock_id = $stock_id;
        } else {
            $this->removeStockField = false;
        }
    }

    public function addStock($stock_id) {
        $stock = ShoeLink::find($stock_id);
        $quantity = $stock->quantity;
        $newQuantity = $quantity + $this->stockValue;
        $stock->quantity = $newQuantity;
        $stock->save();

        $this->stocks = ShoeLink::all();
        $this->stockValue = null;
        $this->addStockField = false;
    }

    public function removeStock($stock_id) {
        $stock = ShoeLink::find($stock_id);
        $quantity = $stock->quantity;
        $newQuantity = $quantity - $this->stockValue;
        if($newQuantity < 0){
            echo 'la quantité ne peux etre négative';
        }else{
            $stock->quantity = $newQuantity;
            $stock->save();

            $this->stocks = ShoeLink::all();
            $this->stockValue = null;
            $this->removeStockField = false;
        }
    }


    public function render()
    {
        return view('livewire.stock');
    }
}
