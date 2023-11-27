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

        </div>
    </div>
</div>