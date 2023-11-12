@extends('layout')

@section('main')

    <div class="text-center pt-10">
        <h1 class="text-4xl">All shoes</h1>
        <div class="absolute top-3 right-10 mt-[-4] mr-4 pt-10">
            <a href="/shoes/create" class="text-right pt-10">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add a shoe</button>
            </a>
        </div>
        <div class="flex flex-wrap pt-10">
            @foreach ($shoes as $shoe)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 p-4">
                    <a href="/shoes/{{ $shoe->id }}">
                        <div class="border p-4">
                            <img src="/images/{{ $shoe->image }}" alt="{{ $shoe->name }}" class="w-full mb-2">
                            <p>Name : {{ $shoe->name }}</p>
                            <p>Price : {{ $shoe->price }} €</p>
                            <p>Size : {{ $shoe->size }}</p>
                        </div>
                </div>
                </a>
            @endforeach
        </div>
    </div>
