<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;


class ShoesController extends Controller
{
    public function index()
    {
        $shoes = Shoe::all();
        if(auth()->user()){
            return view('shoes.index', compact('shoes'));
        }else{
            return view('shoes.indexUser', compact('shoes'));
        }
    }

    public function showPanier(){
        return view('shoes.panier');
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
            'size' => 'required|numeric|between:25,60',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $imageName = request()->file('image')->getClientOriginalName();
        request()->file('image')->move(public_path('images'), $imageName);

        $f = new Shoe();
        $f->name = request()->name;
        $f->price = request()->price;
        $f->size = request()->size;
        $f->image = $imageName;
        $f->save();
        info("Shoe saved");
        return  redirect('/shoes/' . $f->id)->with('success', 'Shoe created successfully!');
    }

    public function show(Shoe $shoe)
    {
        return view('shoes.show', compact('shoe'));
    }

    public function edit(Shoe $shoe)
    {
        return view('shoes.edit', compact('shoe'));
    }

    public function update(Shoe $shoe)
    {
        // request()->validate([
        //     'name' => 'required|min:2|max:20',
        //     'price' => 'required|decimal:0,2|max:99999',
        //     'type' => 'required|max:50',
        //     'mineral_content' => 'required|decimal:0,2|max:100',
        //     'expiry_date' => 'required|date'
        // ]);

        $shoe->name = request()->name;
        $shoe->price = request()->price;
        $shoe->size = request()->size;
        $shoe->save();
        return redirect('/shoes/' . $shoe->id);
    }

    public function destroy(Shoe $shoe)
    {
        $shoe->delete();
        return redirect('/shoes');
    }
}
