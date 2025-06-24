<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                {{-- رسالة الخطأ أو النجاح --}}
                @if(session('error'))
                    <div class="mb-4 p-3 bg-red-200 text-red-800 rounded">
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- ملخص السلة --}}
                <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
                <div class="mb-6">
                    @if(count($cart) > 0)
                        <ul class="divide-y divide-gray-200">
                            @foreach($cart as $item)
                                <li class="py-2 flex justify-between items-center">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['title'] }}" class="w-16 h-20 object-cover rounded">
                                        <div>
                                            <p class="font-medium">{{ $item['title'] }}</p>
                                            <p class="text-sm text-gray-600">Quantity: {{ $item['quantity'] }}</p>
                                        </div>
                                    </div>
                                    <p class="font-semibold">${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-4 text-right text-xl font-bold">
                            Total: ${{ number_format($total, 2) }}
                        </div>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>

                {{-- نموذج بيانات العميل --}}
                <h3 class="text-lg font-semibold mb-4">Your Information</h3>
                <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="block font-medium text-gray-700 mb-1">Address</label>
                        <textarea name="address" id="address" rows="3" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block font-medium text-gray-700 mb-1">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-semibold py-3 rounded hover:bg-blue-700 transition">
                            Place Order
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
