<x-app-layout>
    <div class="text-center pt-10">
        <h1 class="text-4xl">{{ $shoe->name }}</h1>
        @if (auth()->user()->permissions == 1)
            <div class="pt-2">
                <a href="/shoes/{{ $shoe->id }}/edit">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                </a>
            </div>
        @endif

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
        <div class="absolute top-0 right-0 mt-4 mr-4">
            <a href="/shoes/">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Retour</button>
            </a>
        </div>
        @if (auth()->user()->permissions == 1)
            <div class="absolute top-0 left-4 mt-4 mr-4">
                <form action="/shoes/{{ $shoe->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                </form>
            </div>
        @endif
    </div>
</x-app-layout>
