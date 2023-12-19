<div>
    <div class="overflow-x-auto p-8">
        <table class="min-w-full table-auto bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($shoe->hasSize as $index => $size)
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $size->size }}</td>
                        @if(isset($shoe->hasQuantity[$index]))
                            <td class="px-4 py-2 whitespace-nowrap">{{ $shoe->hasQuantity[$index]->quantity }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
