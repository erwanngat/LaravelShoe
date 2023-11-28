<?php

namespace App\Http\Controllers\Api;

use App\Models\Shoe;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ShoeController extends Controller
{
    public function index(){
        return Shoe::all();
    }

    public function show($shoe){
        return Shoe::find($shoe);
    }

    public function store(){
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:1|max:50|regex:/^[A-Z][a-z]+$/',
            'price' => 'required|numeric|between:0,99999.99',
            'size' => 'required|numeric|between:25,60',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        if($validator->fails()){
            return $validator->messages();
        }

        $imageName = request()->file('image')->getClientOriginalName();
        $existingImage = Shoe::where('image', $imageName)->exists();
        if ($existingImage) {
            $imageName = time() . '_' . $imageName;
        }
        request()->file('image')->move(public_path('images'), $imageName);

        $f = new Shoe();
        $f->name = request()->name;
        $f->price = request()->price;
        $f->size = request()->size;
        $f->image = $imageName;
        $f->save();
        return 'created';
    }

    public function update($shoe){
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:1|max:50|regex:/^[A-Z][a-z]+$/',
            'price' => 'required|numeric|between:0,99999.99',
            'size' => 'required|numeric|between:25,60',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        if($validator->fails()){
            return $validator->messages();
        }
         
        $shoe->name = request()->name;
        $shoe->price = request()->price;
        $shoe->size = request()->size;
        $shoe->save();
        return 'updated';
    }

    public function destroy($flour){
        $flour->delete();
        return 'destroyed';
    }
}
