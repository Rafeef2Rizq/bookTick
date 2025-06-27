<x-app-layout>
    <div x-data="{ showImage: false }" class="max-w-6xl mx-auto px-6 py-12">
        <div class="grid md:grid-cols-2 gap-12 items-start">

            <!-- Book Cover with Clickable Modal -->
            <div class="relative">
                <div @click="showImage = true" class="cursor-zoom-in rounded-xl overflow-hidden shadow-lg border border-gray-200 bg-white">
                    <img src="{{asset('images/' . $book->image) }}"
                        alt="{{ $book->title }}"
                        class="w-full h-[450px] object-cover object-center hover:scale-105 transition-transform duration-300" />
                </div>

                <!-- Modal Fullscreen Image -->
                <div x-show="showImage" x-cloak
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80">
                    <div class="relative">
                        <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}"
                            class="max-w-full max-h-screen rounded-lg shadow-lg border border-white" />
                        <button @click="showImage = false"
                            class="absolute top-2 right-2 bg-white text-gray-800 rounded-full p-1 hover:bg-gray-100">
                            ✖
                        </button>
                    </div>
                </div>
            </div>

            <!-- Book Details -->
            <div class="space-y-6">
                <h1 class="text-4xl font-bold text-gray-900">{{ $book->title }}</h1>

                <p class="text-gray-700 text-lg">
                    <span class="font-semibold text-gray-800">Author:</span> {{ $book->author }}
                </p>

                <div class="text-gray-800 leading-relaxed text-justify border-t pt-4 max-h-[300px] overflow-auto">
                    {!! nl2br(e($book->description)) !!}
                </div>

                <!-- Add to Cart Button -->
                <a href="{{ route('cart.add', $book->id) }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow transition-all duration-200">
                    🛒 Add to Cart
                </a>

               
                <br>
                <!-- Back Link -->
                <a href="{{ route('books.index') }}"
                    class="inline-block text-blue-600 hover:underline text-sm mt-4">
                    ← Back to Book List
                </a>
            </div>
        </div>
    </div>

    <!-- AlpineJS CDN -->
    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>