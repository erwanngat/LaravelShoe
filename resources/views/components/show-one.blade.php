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
            <p class="text-left">Size: {{ $shoe->size }}</p>
            <div class="flex space-x-1 pt-6">
                <p class="text-2xl">Available size:</p>
            </div>
            <div class="flex flex-wrap">
                <div class="flex space-x-2 pt-6">
                    @php $count = 0; @endphp
                    @foreach ($shoe->hasSize->map->size as $size)
                        @if ($count == 5)
                            <div class="flex space-x-2 pt-1">
                        @endif
                        <div><x-divSize />{{ $size }}</div>
                        @if ($count == 0)
                            </div>
                        @endif
                        @php $count++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
