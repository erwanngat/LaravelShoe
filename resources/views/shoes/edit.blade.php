<x-app-layout>
    <div class="max-w-screen-md mx-auto text-center">
        <div class="absolute top-0 right-0 pt-20 pr-16">
            <a href="/shoes/{{ $shoe->id }}">
                <x-button>Back to shoe</x-button>
            </a>
        </div>
        <div class="justify-between p-8">
            <h1 class="text-4xl text-center">Edit {{ $shoe->name }} shoes</h1>
        </div>
        <form action="/shoes/{{ $shoe->id }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $shoe->id }}">

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Name:</label>
                <input type="text" id="name" name="name" placeholder="Name" value="{{ $shoe->name }}"
                    required
                    class="w-full px-3 py-2 border rounded-md shadow-md focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold">Price:</label>
                <input type="number" id="price" name="price" step="0.01" placeholder="Price"
                    value="{{ $shoe->price }}" required
                    class="w-full px-3 py-2 border rounded-md shadow-md focus:outline-none focus:ring focus:border-blue-300 @error('price') border-red-500 @enderror">
                @error('price')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="size" class="block text-gray-700 font-bold">Size:</label>
                <input type="number" id="size" name="size" placeholder="size" value="{{ $shoe->size }}"
                    required
                    class="w-full px-3 py-2 border rounded-md shadow-md focus:outline-none focus:ring focus:border-blue-300 @error('type') border-red-500 @enderror">
                @error('size')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold">Image:</label>
                <input type="file" id="image" name="image"
                    class="px-3 py-2 border rounded-md shadow-md focus:outline-none focus:ring focus:border-blue-300 @error('image') border-red-500 @enderror">
                @if ($shoe->image)
                    <p class="text-gray-500">Current image : {{ $shoe->image }}</p>
                @endif
                @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-button type="submit">Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
