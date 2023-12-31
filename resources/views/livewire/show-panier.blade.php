<div class="justify-center">
    <style>
        .custom-width {
            font-size: 4rem;
        }
    </style>
    <div class="absolute top-0 right-0 pt-20 pr-16">
        <a href="{{ route('shoes') }}"">
            <x-button>Back to home</x-button>
        </a>
    </div>
    <div class="w-full p-8 pt-16">
        <div class="border p-4">
            <div class='text-center'>
                <table class="w-full table-fixed">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">Name</th>
                            <th class="p-2">Price</th>
                            <th class="p-2">Size</th>
                            <th class="p-2">Image</th>
                            <th class="p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($shoes as $shoe)
                            <tr class="border-b">
                                <td class='p-2'>{{ $shoe->name }}</td>
                                <td class='p-2'>{{ $shoe->price }} €</td>
                                <td class='p-2'>
                                    @foreach ($cartItems as $cartItem)
                                        @if ($cartItem->shoe_id == $shoe->id)
                                            @if ($cartItem->size)
                                                {{ $cartItem->size }}
                                            @else
                                                <x-button wire:click="toggleMenuSize({{ $shoe->id }})"
                                                    class="w-auto">Choose a size</x-button>
                                                @if ($menuSize && $selectedShoe_id === $shoe->id)
                                                    <div class="max-h-32 overflow-y-auto ml-4 mx-0">
                                                        @foreach ($shoeSizes as $shoeSize)
                                                            @if ($shoeSize->quantity != 0)
                                                                <div class="flex justify-center">
                                                                    <div class="bg-white shadow-md rounded-md w-40">
                                                                        <span
                                                                            wire:click='chooseSize({{ $shoeSize->isSize->size }}, {{ $shoe->id }})'
                                                                            class="block border border-gray-300 py-1 px-4 hover:bg-gray-100 cursor-pointer w-40">{{ $shoeSize->isSize->size }}</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                                <td class='p-2 flex justify-center items-center'>
                                    <img src="/images/{{ $shoe->image }}" alt="{{ $shoe->name }}"
                                        class="max-w-xs max-h-32 object-scale-down">
                                </td>
                                <td class='p-2'>
                                    <button wire:click='removePanier({{ $shoe->id }})'>
                                        <i class="ri-close-line text-red-500 custom-width"></i>
                                    </button>
                                </td>
                            @empty
                                <td colspan="5" class='text-center text-2xl pt-4'>Your cart is empty</td>
                        @endforelse
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        @if ($total != 0)
            @php
                $allShoesHaveSize = true;
            @endphp
            @foreach ($shoes as $shoe)
                @php
                    $shoeHasSize = false;
                @endphp
                @foreach ($cartItems as $cartItem)
                    @if ($cartItem->shoe_id == $shoe->id && $cartItem->size)
                        @php
                            $shoeHasSize = true;
                        @endphp
                    @endif
                @endforeach
                @if (!$shoeHasSize)
                    @php
                        $allShoesHaveSize = false;
                    @endphp
                @endif
            @endforeach
            <p class='text-right text-2xl pt-24 pr-56'>Total : {{ $total }} €</p>
            @if ($allShoesHaveSize)
                <div class='text-right text-2xl pt-2 pr-20'>
                    <a href="{{ route('pay') }}">
                        <x-button>Pay</x-button>
                    </a>
                </div>
            @endif
        @endif
    </div>
</div>
