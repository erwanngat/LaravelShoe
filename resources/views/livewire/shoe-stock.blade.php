<div>
    <table class="w-full bg-white border border-gray-200 text-center p-6 text-xl">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Reference
                </th>
                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity
                </th>
                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($shoeStocks as $shoeStock)
                <tr>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $shoeStock->id }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $shoeStock->isShoe->name }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $shoeStock->isSize->size }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $shoeStock->quantity }}</td>
                    <td><x-button wire:click="toggleMenuAction({{ $shoeStock->id }})" class="w-auto">Manage
                            stock</x-button>
                        @if ($menu && $selectedStock_id === $shoeStock->id)
                            <div class="flex justify-center">
                                <div class="mt-2 bg-white shadow-md rounded-md w-36">
                                    <span wire:click='toggleAddStockField({{ $shoeStock->id }})'
                                        class="block border border-gray-300 py-2 px-4 hover:bg-gray-100 cursor-pointer w-36 text-base">Add
                                        stock</span>
                                    @if ($addStockField && $selectedStock_id === $shoeStock->id)
                                        <input class="w-36" type="number" placeholder="amount to add"
                                            wire:model="stockValue" wire:keydown.enter="addStock({{ $shoeStock->id }})">
                                    @endif
                                    <span wire:click='toggleRemoveStockField({{ $shoeStock->id }})'
                                        class="block border border-gray-300 py-2 px-4 hover:bg-gray-100 cursor-pointer w-36 text-base">Remove
                                        stock</span>
                                    @if ($removeStockField && $selectedStock_id === $shoeStock->id)
                                        <input class="w-36" type="number" placeholder="amount to remove"
                                            wire:model="stockValue"
                                            wire:keydown.enter="removeStock({{ $shoeStock->id }})">
                                    @endif
                                    <span wire:click='toggleSetStockField({{ $shoeStock->id }})'
                                        class="block border border-gray-300 py-2 px-4 hover:bg-gray-100 cursor-pointer w-36 text-base">Set
                                        stock</span>
                                    @if ($setStockField && $selectedStock_id === $shoeStock->id)
                                        <input class="w-36" type="number" placeholder="amount to set"
                                            wire:model="stockValue" wire:keydown.enter="setStock({{ $shoeStock->id }})">
                                    @endif
                                </div>
                            </div>
                    </td>
            @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
