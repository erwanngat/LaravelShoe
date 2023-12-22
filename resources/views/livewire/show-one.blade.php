<div>
    <div class="text-center pt-8">
        <div class="absolute top-0 right-0 pt-20 pr-16">
            <a href="{{ route('shoes') }}"">
                <x-button>Back to home</x-button>
            </a>
        </div>
        <h1 class="text-4xl">{{ $shoe->name }}</h1>
        @if (auth()->user()->permissions == 1)
            <div class="pt-2">
                <a href="/shoes/{{ $shoe->id }}/edit">
                    <x-button>Edit</x-button>
                </a>
            </div>
        @endif
        @if (auth()->user()->permissions == 1)
            <div class="pt-2">
                <a href="/shoes/{{ $shoe->id }}/stock">
                    <x-button>Manage shoe stock</x-button>
                </a>
            </div>
        @endif
        <div class="flex pt-20 ml-40">
            <div class="flex w-1/1 ml-40">
                <div class="w-1/3 p-4 ml-40">
                    <img class="border border-black mx-auto" src="/images/{{ $shoe->image }}" alt="{{ $shoe->name }}"
                        class="w-full mb-2">
                </div>
                <div class="w-1/3 m-10 pl-5 text-lg">
                    <p class="text-left">Name: {{ $shoe->name }}</p>
                    <p class="text-left">Description: Lipsum Lorem</p>
                    <p class="text-left">Price: {{ $shoe->price }} €</p>
                    <div class="flex space-x-1 pt-6">
                        <p class="text-2xl">Choose your size:</p>
                    </div>
                    <div class="flex flex-wrap pt-6 space-x-4">
                        @php $count = 0; @endphp
                        @foreach ($shoe->hasQuantity as $shoeLink)
                            @if ($count === 0)
                    </div>
                    <div class="flex space-x-4 pt-1">
                        <div class="flex flex-col items-start">
                            <div @if ($shoeLink->quantity > 0) wire:click='appearAddCart({{ $shoeLink->isSize->size }}, {{ $shoeLink->id }})' @endif
                                class="border-2 border-gray-500 rounded-lg w-20 h-20 text-2xl flex items-center justify-center hover:bg-gray-200 @if ($shoeLink->quantity == 0) cursor-not-allowed @else cursor-pointer @endif flex-col @if ($selectedItem == $shoeLink->id) bg-gray-400 @endif"
                                title="Add to cart">
                                {{ $shoeLink->isSize->size }}
                                @if ($shoeLink->quantity == 0)
                                    <p class="text-sm text-red-700">out of stock</p>
                            </div>
                        @else
                            <p class="text-sm text-red-700">{{ $shoeLink->quantity }} left</p>
                        </div>
                        @endif
                    </div>
                @else
                    <div class="flex flex-col items-start">
                        <div @if ($shoeLink->quantity > 0) wire:click='appearAddCart({{ $shoeLink->isSize->size }}, {{ $shoeLink->id }})' @endif
                            class="border-2 border-gray-500 rounded-lg w-20 h-20 text-2xl flex items-center justify-center hover:bg-gray-200 @if ($shoeLink->quantity == 0) cursor-not-allowed @else cursor-pointer @endif flex-col @if ($selectedItem == $shoeLink->id) bg-gray-400 @endif"
                            title="Add to cart">
                            {{ $shoeLink->isSize->size }}
                            @if ($shoeLink->quantity == 0)
                                <p class="text-sm text-red-700">out of stock</p>
                        </div>
                    @else
                        <p class="text-sm text-red-700">{{ $shoeLink->quantity }} left</p>
                    </div>
                    @endif
                </div>
                @endif
                @php
                    $count++;
                    if ($count === 4) {
                        $count = 0;
                    }
                @endphp
                @endforeach
            </div>
            @if (auth()->user()->permissions == 0)
                <div class='pt-8'>
                    @if ($menuCart)
                        <x-button wire:click='addToCart' class='justify-end ml-64'>Add to cart</x-button>
                    @endif
                </div>
            @endif
        </div>


        @if (auth()->user()->permissions == 1)
            <div class="absolute top-0 left-4 mt-4 mr-4">
                <form action="/shoes/{{ $shoe->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        @endif
    </div>
</div>
