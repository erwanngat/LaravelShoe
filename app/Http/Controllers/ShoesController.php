<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Size;
use App\Models\Panier;
use App\Models\ShoeLink;
use Illuminate\Http\Request;


class ShoesController extends Controller
{
    public function index()
    {
        $shoes = Shoe::all();
        if (auth()->user()) {
            return view('shoes.index', compact('shoes'));
        } else {
            return view('shoes.indexUser', compact('shoes'));
        }
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
        // valider les données
        request()->validate([
            'name' => 'required|min:1|max:50|regex:/^[A-Z][a-z]+$/',
            'price' => 'required|numeric|between:0,99999.99',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $imageName = request()->file('image')->getClientOriginalName();
        $existingImage = Shoe::where('image', $imageName)->exists();
        if ($existingImage) {
            $imageName = time() . '_' . $imageName;
        }
        request()->file('image')->move(public_path('images'), $imageName);

        $shoe = new Shoe();
        $shoe->name = request()->name;
        $shoe->price = request()->price;
        $shoe->image = $imageName;
        $shoe->save();
        info("Shoe saved");
        return  redirect('/shoes/' . $shoe->id)->with('success', 'Shoe created successfully!');
    }

    public function show(Shoe $shoe)
    {
        if (auth()->user()) {
            return view('shoes.show', compact('shoe'));
        } else {
            return view('shoes.showUser', compact('shoe'));
        }
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
        if (request()->hasFile('image')) {
            $imageName = request()->file('image')->getClientOriginalName();
            $existingImage = Shoe::where('image', $imageName)->exists();
            if ($existingImage) {
                $imageName = time() . '_' . $imageName;
            }
            request()->file('image')->move(public_path('images'), $imageName);
            $shoe->image = $imageName;
        }

        $shoe->name = request()->name;
        $shoe->price = request()->price;
        $shoe->save();
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
        $shoe = Shoe::find($shoe->id);
        return view('shoes.shoeStock', compact('shoe'));
    }

    public function stock(){
        $stocks = ShoeLink::all();
        return view('shoes.stock', compact('stocks'));
        }
}
