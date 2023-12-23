<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Size;
use App\Models\CartItem;
use App\Models\ShoeLink;
use Illuminate\Http\Request;


class ShoesController extends Controller
{
    public function index()
    {
        $shoes = Shoe::all();
        $view = auth()->user() ? 'shoes.index' : 'shoes.indexUser';
        return view($view, compact('shoes'));
    }

    public function showPanier()
    {
        $cart = auth()->user()->cart;
        $shoes = $cart->flatMap->shoes;
        return view('shoes.panier')->with('shoes', $shoes);
    }
    public function create()
    {
        return view('shoes.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|min:1|max:50|regex:/^[A-Z][a-z]+$/',
            'price' => 'required|numeric|between:0,99999.99',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $imageName = time() . '_' . request()->file('image')->getClientOriginalName();
        request()->file('image')->move(public_path('images'), $imageName);

        $shoe = Shoe::create([
            'name' => request()->name,
            'price' => request()->price,
            'image' => $imageName,
        ]);

        $shoeLinks = [];
        for ($i = 1; $i <= 15; $i++) {
            $shoeLinks[] = [
                'shoe_id' => $shoe->id,
                'size_id' => $i,
                'quantity' => 0,
            ];
        }

        ShoeLink::insert($shoeLinks);
        return  redirect('/shoes/' . $shoe->id);
    }

    public function show(Shoe $shoe)
    {
        $view = auth()->user() ? 'shoes.show' : 'shoes.showUser';
        return view($view, compact('shoe'));
    }

    public function edit(Shoe $shoe)
    {
        return view('shoes.edit', compact('shoe'));
    }

    public function update(Shoe $shoe)
    {
        request()->validate([
            'name' => 'required|min:1|max:50|regex:/^[A-Z][a-z]+$/',
            'price' => 'required|numeric|between:0,99999.99',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $data = [
            'name' => request()->name,
            'price' => request()->price,
        ];
    
        if (request()->hasFile('image')) {
            $imageName = time() . '_' . request()->file('image')->getClientOriginalName();
            request()->file('image')->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
    
        $shoe->update($data);
        
        return redirect('/shoes/' . $shoe->id);
    }

    public function pay()
    {
        return view('pay');
    }

    public function destroy(Shoe $shoe)
    {
        $shoe->delete();
        return redirect('/shoes');
    }

    public function shoeStock(Shoe $shoe)
    {
        $shoeStocks = $shoe->hasQuantity;
        return view('shoes.shoeStock', compact('shoeStocks'));
    }

    public function stock(){
        $stocks = ShoeLink::all();
        return view('shoes.stock', compact('stocks'));
    }

    public function buy(){
        $cart_id = auth()->user()->cart->map->id->first();
        $cartItems = CartItem::where('cart_id', $cart_id)
        ->get();
        foreach($cartItems as $cartItem){
            $size = $cartItem->size;
            $size = Size::where('size', $size)
            ->first();
            $size_id = $size->id;
            $shoe_id = $cartItem->shoe_id;
            $shoeStock = ShoeLink::where('shoe_id', $shoe_id)
            ->where('size_id', $size_id)
            ->first();
            $shoeQuantity = $shoeStock->quantity;
            $newShoeQuantity = $shoeQuantity - 1;

            $shoeStock->quantity = $newShoeQuantity;
            $shoeStock->save();

            $cartItem->delete();
        }
        return redirect('shoes');
    }
}
