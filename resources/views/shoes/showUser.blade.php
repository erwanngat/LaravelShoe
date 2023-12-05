<x-guest-layout>
    <div class="text-center pt-10">
        <h1 class="text-4xl">{{ $shoe->name }}</h1>
        <x-show-one :shoe='$shoe' />
        <div class="absolute top-0 right-0 mt-4 mr-4">
            <a href="/shoes/">
                <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to
                    home</x-button>
            </a>
        </div>
    </div>
    </div>
</x-guest-layout>
