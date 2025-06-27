<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if(count($cart) > 0)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-left">
                                <th class="px-4 py-2">Book</th>
                                <th class="px-4 py-2">Quantity</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Total</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grandTotal = 0; @endphp
                            @foreach ($cart as $id => $item)
                                @php
                                    $total = $item['price'] * $item['quantity'];
                                    $grandTotal += $total;
                                @endphp
                                <tr class="border-b">
                                    <td class="px-4 py-2 flex items-center gap-4">
                                        <img src="{{ asset('images/' . ($item['image'] ?? 'default-book.png')) }}" class="w-16 h-16 object-cover rounded">
                                        <div>
                                            <div class="font-bold">{{ $item['title'] }}</div>
                                            <div class="text-sm text-gray-600">${{ $item['price'] }}</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="inline-flex">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 border rounded px-2 py-1 text-center">
                                            <button type="submit" class="ml-2 bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 text-sm">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-2">${{ $item['price'] }}</td>
                                    <td class="px-4 py-2 font-semibold">${{ $total }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('cart.remove', $id) }}" class="text-red-500 hover:underline text-sm">
                                            Remove
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="bg-gray-100 font-bold">
                                <td colspan="3" class="px-4 py-2 text-right">Total:</td>
                                <td colspan="2" class="px-4 py-2">${{ $grandTotal }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- زر اتمام الشراء --}}
                    <div class="mt-6 text-right">
                        <a href="{{ route('checkout.index') }}" 
                           class="inline-block bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700 transition">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            @else
                <div class="bg-white p-6 rounded shadow text-center">
                    <p class="text-gray-600 text-lg">Your cart is empty.</p>
                    <a href="{{ route('books.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Browse Books
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
