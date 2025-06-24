<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thank You') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
            <h1 class="text-3xl font-bold mb-4">Thank you for your purchase!</h1>
            <p class="mb-6 text-gray-700">Your order has been successfully placed. We appreciate your trust in us.</p>
            <a href="{{ route('books.index') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
                Continue Shopping
            </a>
        </div>
    </div>
</x-app-layout>
