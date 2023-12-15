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
                <p class="text-2xl">Available size:</p>
            </div>
            <div class="flex flex-wrap pt-6 space-x-4">
                @php $count = 0; @endphp
                @foreach ($shoe->hasSize->map->size as $size)
                    @if ($count === 0)
            </div>
                    <div class="flex space-x-4 pt-1">
                        <x-divSize/>{{ $size }}</div>
                    @else
                        <x-divSize/>{{ $size }}</div>
                    @endif
                    @php
                        $count++;
                        if ($count === 4) {
                            $count = 0;
                        }
                    @endphp
                @endforeach
    </div>
</div>

