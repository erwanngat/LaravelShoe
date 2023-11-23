<div class="text-center pt-10">
    <h1 class="text-4xl mb-8">All shoes</h1>

    <div class="flex flex-wrap">
        @foreach ($shoes as $shoe)
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 p-4">
                <div class="border p-4">
                    <button wire:click='addPanier({{ $shoe->id }})' class='p-2 bg-blue-200 rounded-2xl'>Add to
                        card</button>
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
