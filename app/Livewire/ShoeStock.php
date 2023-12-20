<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShoeLink;

class ShoeStock extends Component
{
    public $shoeStocks;
    public $menu = false;
    public $addStockField = false;
    public $removeStockField = false;
    public $setStockField = false;
    public $selectedStock_id;
    public $stockValue;

    public function toggleMenuAction($stock_id)
    {
        if (!$this->menu || $this->selectedStock_id !== $stock_id) {
            $this->menu = true;
            $this->selectedStock_id = $stock_id;
        } else {
            $this->menu = false;
        }
    }

    public function toggleAddStockField($stock_id)
    {
        if (!$this->addStockField || $this->selectedStock_id !== $stock_id) {
            $this->addStockField = true;
            $this->selectedStock_id = $stock_id;
        } else {
            $this->addStockField = false;
        }
    }

    public function toggleRemoveStockField($stock_id)
    {
        if (!$this->removeStockField || $this->selectedStock_id !== $stock_id) {
            $this->removeStockField = true;
            $this->selectedStock_id = $stock_id;
        } else {
            $this->removeStockField = false;
        }
    }

    public function toggleSetStockField($stock_id)
    {
        if (!$this->setStockField || $this->selectedStock_id !== $stock_id) {
            $this->setStockField = true;
            $this->selectedStock_id = $stock_id;
        } else {
            $this->setStockField = false;
        }
    }

    public function addStock($stock_id)
    {
        $shoeStock = ShoeLink::find($stock_id);
        $quantity = $shoeStock->quantity;
        $newQuantity = $quantity + $this->stockValue;
        $shoeStock->quantity = $newQuantity;
        $shoeStock->save();

        $this->shoeStocks = ShoeLink::all();
        $this->stockValue = null;
        $this->addStockField = false;
    }

    public function removeStock($stock_id)
    {
        $shoeStock = ShoeLink::find($stock_id);
        $quantity = $shoeStock->quantity;
        $newQuantity = $quantity - $this->stockValue;
        if ($newQuantity < 0) {
            echo 'la quantité ne peux etre négative';
        } else {
            $shoeStock->quantity = $newQuantity;
            $shoeStock->save();

            $this->shoeStocks = ShoeLink::all();
            $this->stockValue = null;
            $this->removeStockField = false;
        }
    }

    public function setStock($stock_id)
    {
        $shoeStock = ShoeLink::find($stock_id);
        $newQuantity = $this->stockValue;
        if ($newQuantity < 0) {
            echo 'la quantité ne peux etre négative';
        } else {
            $shoeStock->quantity = $newQuantity;
            $shoeStock->save();

            $this->shoeStocks = ShoeLink::all();
            $this->stockValue = null;
            $this->removeStockField = false;
        }
    }
    public function render()
    {
        return view('livewire.shoe-stock');
    }
}
