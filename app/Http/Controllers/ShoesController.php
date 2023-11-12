<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;


class ShoesController extends Controller
{
    public function index()
    {
        $shoes = Shoe::all();
        return view('shoes.index', compact('shoes'));
    }

    public function create()
    {
        return view('shoes.create');
    }

    public function store()
    {
        // valider les données
        // request()->validate([
        //     'name' => 'required|min:2|max:20|regex:/^[A-Z][a-z]+$/',
        //     'price' => 'required|decimal:0,2|max:99999',
        //     'type' => 'required|max:50',
        //     'mineral_content' => 'required|decimal:0,2|max:100',
        //     'expiry_date' => 'required|date'
        // ]);

        $f = new Shoe();
        $f->name = request()->name;
        $f->price = request()->price;
        $f->size = request()->size;
        $f->save();
        return  redirect('/shoes/' . $f->id);
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

    public function destroy(Shoe $shoe){
        $shoe->delete();
        return redirect('/shoes');
    }
}
