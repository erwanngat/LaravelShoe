<div>
    <div class='m-4 p-4'>
        <p class='text-xl'>Search by reference</p>
        <div class="search-container mb-6 w-64 pl-6">
            <input type="number" id="searchInput" placeholder="Search..."
                class="w-1/4 p-2 border border-gray-300 rounded-md" wire:model="reference" wire:keydown.enter="search">
        </div>
    </div>
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
            @foreach ($stocks as $stock)
                <tr>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $stock->id }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $stock->isShoe->name }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $stock->isSize->size }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $stock->quantity }}</td>
                    <td><x-button wire:click="toggleMenuAction({{ $stock->id }})" class="w-auto">Manage
                            stock</x-button>
                        @if ($menu && $selectedStock_id === $stock->id)
                            <div class="mt-2 flex justify-center">
                                <div class="mt-2 bg-white shadow-md rounded-md w-36">
                                    <span wire:click='toggleAddStockField({{ $stock->id }})'
                                        class="block border border-gray-300 py-2 px-4 hover:bg-gray-100 cursor-pointer w-36">Add
                                        stock</span>
                                    @if ($addStockField && $selectedStock_id === $stock->id)
                                        <input class="w-36" type="number" placeholder="amount to add"
                                            wire:model="stockValue" wire:keydown.enter="addStock({{ $stock->id }})">
                                    @endif
                                    <span wire:click='toggleRemoveStockField({{ $stock->id }})'
                                        class="block border border-gray-300 py-2 px-4 hover:bg-gray-100 cursor-pointer w-36">Remove
                                        stock</span>
                                    @if ($removeStockField && $selectedStock_id === $stock->id)
                                        <input class="w-36" type="number" placeholder="amount to remove"
                                            wire:model="stockValue"
                                            wire:keydown.enter="removeStock({{ $stock->id }})">
                                    @endif
                                    <span wire:click='toggleSetStockField({{ $stock->id }})'
                                        class="block border border-gray-300 py-2 px-4 hover:bg-gray-100 cursor-pointer w-36">Set
                                        stock</span>
                                    @if ($setStockField && $selectedStock_id === $stock->id)
                                        <input class="w-36" type="number" placeholder="amount to set"
                                            wire:model="stockValue" wire:keydown.enter="setStock({{ $stock->id }})">
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
