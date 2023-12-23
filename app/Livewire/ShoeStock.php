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
        $this->menu = (!$this->menu || $this->selectedStock_id !== $stock_id) ? true : false;
        $this->selectedStock_id = $this->menu ? $stock_id : null;
        $this->addStockField = false;
        $this->removeStockField = false;
        $this->setStockField = false;
    }

    public function toggleAddStockField($stock_id)
    {
        $this->addStockField = (!$this->addStockField || $this->selectedStock_id !== $stock_id) ? true : false;
        if ($this->selectedStock_id == null) {
            $this->selectedStock_id = $this->addStockField ? $stock_id : null;
        }
        $this->removeStockField = false;
        $this->setStockField = false;
    }

    public function toggleRemoveStockField($stock_id)
    {
        $this->removeStockField = (!$this->removeStockField || $this->selectedStock_id !== $stock_id) ? true : false;
        if ($this->selectedStock_id == null) {
            $this->selectedStock_id = $this->removeStockField ? $stock_id : null;
        }
        $this->addStockField = false;
        $this->setStockField = false;
    }

    public function toggleSetStockField($stock_id)
    {
        $this->setStockField = (!$this->setStockField || $this->selectedStock_id !== $stock_id) ? true : false;
        if ($this->selectedStock_id == null) {
            $this->selectedStock_id = $this->setStockField ? $stock_id : null;
        }
        $this->addStockField = false;
        $this->removeStockField = false;
    }

    public function addStock($stock_id)
    {
        $shoeStock = ShoeLink::find($stock_id);

        if ($this->stockValue > 0) {
            $shoeStock->increment('quantity', $this->stockValue);

            $key = $this->shoeStocks->search(function ($item) use ($shoeStock) {
                return $item->id === $shoeStock->id;
            });

            if ($key !== false) {
                $this->shoeStocks[$key] = $shoeStock;
            }
        }
        $this->stockValue = null;
    }

    public function removeStock($stock_id)
    {
        $shoeStock = ShoeLink::find($stock_id);

        if ($this->stockValue > 0) {
            $shoeStock->decrement('quantity', $this->stockValue);

            $key = $this->shoeStocks->search(function ($item) use ($shoeStock) {
                return $item->id === $shoeStock->id;
            });

            if ($key !== false) {
                $this->shoeStocks[$key] = $shoeStock;
            }
        }
        if($shoeStock->quantity < 0){
            $shoeStock->quantity = 0;
        }
        $this->stockValue = null;
    }

    public function setStock($stock_id)
    {

        $shoeStock = ShoeLink::find($stock_id);

        if ($this->stockValue >= 0) {
            $shoeStock->update(['quantity' => $this->stockValue]);

            $key = $this->shoeStocks->search(function ($item) use ($shoeStock) {
                return $item->id === $shoeStock->id;
            });

            if ($key !== false) {
                $this->shoeStocks[$key] = $shoeStock;
            }
        }
        if($shoeStock->quantity < 0){
            $shoeStock->quantity = 0;
        }
        $this->stockValue = null;
    }
    
    public function render()
    {
        return view('livewire.shoe-stock');
    }
}
