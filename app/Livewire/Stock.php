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
    public $setStockField = false;
    public $selectedStock_id;
    public $stockValue;
    public $reference;

    public function toggleMenuAction($stock_id){
        $this->menu = (!$this->menu || $this->selectedStock_id !== $stock_id) ? true : false;
        $this->selectedStock_id = $this->menu ? $stock_id : null;
        $this->addStockField = false;
        $this->removeStockField = false;
        $this->setStockField = false;
    }

    public function toggleAddStockField($stock_id){
        $this->addStockField = (!$this->addStockField || $this->selectedStock_id !== $stock_id) ? true : false;
        if ($this->selectedStock_id == null) {
            $this->selectedStock_id = $this->addStockField ? $stock_id : null;
        }
        $this->removeStockField = false;
        $this->setStockField = false;
    }

    public function toggleRemoveStockField($stock_id){
        $this->removeStockField = (!$this->removeStockField || $this->selectedStock_id !== $stock_id) ? true : false;
        if ($this->selectedStock_id == null) {
            $this->selectedStock_id = $this->removeStockField ? $stock_id : null;
        }
        $this->addStockField = false;
        $this->setStockField = false;
    }

    public function toggleSetStockField($stock_id){
        $this->setStockField = (!$this->setStockField || $this->selectedStock_id !== $stock_id) ? true : false;
        if ($this->selectedStock_id == null) {
            $this->selectedStock_id = $this->setStockField ? $stock_id : null;
        }
        $this->addStockField = false;
        $this->removeStockField = false;
    }

    public function addStock($stock_id){
        $stock = ShoeLink::find($stock_id);
        if ($this->stockValue > 0) {
            $stock->increment('quantity', $this->stockValue);
            $stock->save();
        }
        $this->stocks = ShoeLink::all();
        $this->stockValue = null;
        $this->addStockField = false;
    }

    public function removeStock($stock_id){
        $stock = ShoeLink::find($stock_id);
        if($this->stockValue > 0){
            $stock->decrement('quantity', $this->stockValue);
            if($stock->quantity < 0){
                $stock->quantity = 0;
            }
            $stock->save();
        }
        $this->stocks = ShoeLink::all();
        $this->stockValue = null;
        $this->removeStockField = false;
    }

    public function setStock($stock_id){
        $stock = ShoeLink::find($stock_id);
        $newQuantity = $this->stockValue;
        if ($newQuantity < 0) {
            $newQuantity = 0;
        }
        $stock->quantity = $newQuantity;
        $stock->save();

        $this->stocks = ShoeLink::all();
        $this->stockValue = null;
        $this->removeStockField = false;
    }

    public function search(){
        $shoe = ShoeLink::find($this->reference);
        $this->stocks = [$shoe];
    }


    public function render(){
        return view('livewire.stock');
    }
}
