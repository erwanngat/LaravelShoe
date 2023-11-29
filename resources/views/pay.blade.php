<x-app-layout>
    <div class="max-w-screen-md mx-auto text-center">
        <div class="justify-between p-8">
            <h1 class="text-4xl text-center">Buy your shoes</h1>
        </div>
        <form action="/shoes" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Card name:</label>
                <input type="text" id="name" name="name" placeholder="Card name" value="{{ old('name') }}"
                    required
                    class="w-full px-3 py-2 border rounded-md shadow-md focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="number" class="block text-gray-700 font-bold">Card number:</label>
                <input type="number" id="number" name="number" step="0.01" placeholder="Card number"
                    value="{{ old('number') }}" required
                    class="w-full px-3 py-2 border rounded-md shadow-md focus:outline-none focus:ring focus:border-blue-300 @error('price') border-red-500 @enderror">
                @error('number')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-bold">Card expiry date:</label>
                <input type="date" id="date" name="date" placeholder="Card expiry date"
                    value="{{ old('date') }}" required
                    class="w-full px-3 py-2 border rounded-md shadow-md focus:outline-none focus:ring focus:border-blue-300 @error('type') border-red-500 @enderror">
                @error('date')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="code" class="block text-gray-700 font-bold">Card security code:</label>
                <input type="number" id="code" name="code" placeholder="Card security code"
                    value="{{ old('code') }}" required
                    class="px-3 py-2 border rounded-md shadow-md focus:outline-none focus:ring focus:border-blue-300 @error('type') border-red-500 @enderror">
                @error('code')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-button type="submit">Pay</x-button>
            </div>
        </form>
        <div class="absolute top-0 right-0 pt-20 pr-16">
            <a href="{{ route('cart') }}"">
                <x-button>Back to cart</x-button>
            </a>
        </div>
    </div>
</x-app-layout>
