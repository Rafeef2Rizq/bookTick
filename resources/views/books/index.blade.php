<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book List') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <?php
    $cart = session('cart', []);
    $cartCount = 0;
    foreach ($cart as $item) {
        $cartCount += $item['quantity'];
    }
?>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="flex justify-end mb-4">
    <a href="{{ route('cart.index') }}" class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700 hover:text-gray-900 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h11L17 13M9 21h.01M15 21h.01" />
        </svg>
        @if($cartCount > 0)
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
            {{ $cartCount }}
        </span>
        @endif
    </a>
</div>


            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($books as $book)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <img
                        src="{{ $book->image ? asset('images/' . $book->image) : asset('images/default-book.png') }}"
                        alt="{{ $book->title }}"
                        class="w-full h-56 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800 mb-1"><a href="{{route('books.show', $book->id)}}">{{ $book->title }}</a></h3>
                        <p class="text-sm text-gray-600 mb-1">Author: {{ $book->author }}</p>
                        <p class="text-green-600 font-semibold mb-3">Price: ${{ $book->price }}</p>
                        <a href="{{ route('cart.add', $book->id) }}" class="inline-block bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                            Add to Cart
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-center col-span-4 text-gray-600">No books available at the moment.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>