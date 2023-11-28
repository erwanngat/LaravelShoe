<div class="flex justify-center">
    <style>
        .custom-width {
            font-size: 4rem;
        }
    </style>
    <div class="w-full p-8">
        <div class="border p-4">
            <div class='text-center'>
                <table class="w-full table-fixed">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">Name</th>
                            <th class="p-2">Price</th>
                            <th class="p-2">Size</th>
                            <th class="p-2">Image</th>
                            <th class="p-2">Number</th>
                            <th class="p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($shoes as $shoe)
                            <tr class="border-b">
                                <td class='p-2'>{{ $shoe->name }}</td>
                                <td class='p-2'>{{ $shoe->price }} €</td>
                                <td class='p-2'>{{ $shoe->size }}</td>
                                <td class='p-2 flex justify-center items-center'>
                                    <img src="/images/{{ $shoe->image }}" alt="{{ $shoe->name }}"
                                        class="max-w-xs max-h-32 object-scale-down">
                                </td>
                                <td class='p-2'> {{ $shoe->number }}</td>
                                <td>
                                    <button wire:click='removePanier({{ $shoe->id }})'>
                                        <i class="ri-close-line text-red-500 custom-width"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class='text-center text-2xl'>Votre panier est vide</td>
                            <tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
