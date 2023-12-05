<x-guest-layout>
    <div class="justify-between p-8">
        <div class="flex justify-end items-center h-16">
            <a href="{{ route('login') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                in</a>

            <a href="{{ route('register') }}"
                class="pl-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
        </div>
        <h1 class="text-4xl text-center">All shoes</h1>
    </div>

    <div class="text-center pt-10">
        <x-all-shoes-list :shoes='$shoes' />
    </div>
</x-guest-layout>
