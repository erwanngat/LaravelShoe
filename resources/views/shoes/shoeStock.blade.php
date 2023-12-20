<x-app-layout>
    <div class="absolute top-0 right-0 pt-20 pr-16">
        <a href="/shoes/{{ $shoeStocks->map->shoe_id[0] }}">
            <x-button>Back to shoe</x-button>
        </a>
    </div>
    <br><br><br>
        <livewire:shoe-stock :shoeStocks="$shoeStocks" />
</x-app-layout>
