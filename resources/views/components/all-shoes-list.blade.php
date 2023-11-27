<div class="flex flex-wrap pt-10">
    @foreach ($shoes as $shoe)
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 p-4">
            <a href="/shoes/{{ $shoe->id }}">
                <div class="border p-4">
                    <img src="/images/{{ $shoe->image }}" alt="{{ $shoe->name }}" class="w-full mb-2">
                    <p>Name : {{ $shoe->name }}</p>
                    <p>Price : {{ $shoe->price }} €</p>
                    <p>Size : {{ $shoe->size }}</p>
                </div>
        </div>
        </a>
    @endforeach
</div>