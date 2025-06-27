<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                {{-- عرض رسائل الخطأ أو النجاح --}}
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

                {{-- نموذج الدفع --}}
                <h3 class="text-lg font-semibold mb-4">Your Information & Payment</h3>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form" class="space-y-6">
                    @csrf

                    {{-- بيانات العميل --}}
                    <div>
                        <label for="name" class="block font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="address" class="block font-medium text-gray-700 mb-1">Address</label>
                        <textarea name="address" id="address" rows="3" required
                                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('address') }}</textarea>
                        @error('address') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="phone" class="block font-medium text-gray-700 mb-1">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('phone') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- بطاقة الدفع --}}
                    <div>
                        <label for="card-holder-name" class="block font-medium text-gray-700 mb-1">Card Holder Name</label>
                        <input id="card-holder-name" type="text" required
                               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-3">
                    </div>

                    <div>
                        <label for="card-element" class="block font-medium text-gray-700 mb-1">Credit or Debit Card</label>
                        <div id="card-element" class="w-full border border-gray-300 rounded px-3 py-3"></div>
                        <div id="card-errors" class="text-red-600 text-sm mt-2"></div>
                    </div>

                    {{-- بيانات مخفية --}}
                    <input type="hidden" name="payment_method" id="payment-method">

                    <div>
                        <button type="submit" id="card-button"
                                class="w-full bg-blue-600 text-white font-semibold py-3 rounded hover:bg-blue-700 transition"
                                data-secret="{{ $intent->client_secret }}">
                            Pay & Place Order
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        const form = document.getElementById('payment-form');
        const errorDisplay = document.getElementById('card-errors');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            cardButton.disabled = true;
            cardButton.textContent = "Processing...";

            const { error, paymentIntent } = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value,
                    }
                }
            });

            if (error) {
                errorDisplay.textContent = error.message;
                cardButton.disabled = false;
                cardButton.textContent = "Pay & Place Order";
            } else if (paymentIntent.status === 'succeeded') {
                // إذا تم الدفع بنجاح، نعيد توجيه المستخدم يدويًا
                window.location.href = "{{ route('checkout.thankyou') }}";
            } else {
                errorDisplay.textContent = "Unexpected status: " + paymentIntent.status;
                cardButton.disabled = false;
                cardButton.textContent = "Pay & Place Order";
            }
        });
    });
</script>
@endpush


</x-app-layout>
