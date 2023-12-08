<div>
    <style>
        .custom-icon {
            font-size: 6rem;
        }

        .custom-translate {
            transform: translateX(380px);
        }
    </style>
    <div class="grid grid-cols-2">
        <div class="text-center pt-10 custom-translate">
            <h1 class="text-4xl">All shoes</h1>
        </div>
        <div class="flex justify-end items-center pr-40">
            <a href='/panier'>
                <i class="ri-shopping-cart-2-line custom-icon"></i>
            </a>
            @if ($count != 0)
                <p class='text-4xl text-red-500'>{{ $count }}</p>
            @endif
        </div>
    </div>
    <div class="pl-32">
        <x-button wire:click="toggleMenu" class="w-auto">Sort</x-button>
        @if ($menu)
            <div class="mt-2 bg-white shadow-md rounded-md w-36">
                <span wire:click='sortAlpha'
                    class="block border border-gray-300 py-2 px-4 hover:bg-gray-100 cursor-pointer w-36">Alphabetic</span>
                <span wire:click='sortCroissant'
                    class="block border border-gray-300 py-2 px-4 hover:bg-gray-100 cursor-pointer w-36">Ascending</span>
                <span wire:click='sortDecroissant'
                    class="block border border-gray-300 py-2 px-4 hover:bg-gray-100 cursor-pointer w-36">Descending</span>
            </div>
        @endif
    </div>


    <div class="flex flex-wrap">
        @foreach ($shoes as $shoe)
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 p-4">
                <div class="border p-4">
                    <div class='text-center'>
                        <button wire:click='addPanier({{ $shoe->id }})' class='p-2 bg-blue-200 rounded-2xl'>Add to
                            cart</button>
                    </div>
                    <a href="/shoes/{{ $shoe->id }}">
                        <img src="/images/{{ $shoe->image }}" alt="{{ $shoe->name }}" class="w-full mb-2">
                        <p>Name : {{ $shoe->name }}</p>
                        <p>Price : {{ $shoe->price }} €</p>
                        <p>Size : {{ $shoe->size }}</p>
                </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
