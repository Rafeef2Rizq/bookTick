<x-main.head />

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>

    <!-- HEADER AREA -->
    <x-main.header />
    <x-main.menu />
    <x-main.contact />



    <!-- ABOUT AREA -->
    <section id="about">
        <!-- محتوى about -->
    </section>

    <!-- CART / CHECKOUT AREA START -->
    <section id="checkout" class="container py-5">
        @if(count($cart) > 0)
        <div class="row">
            @php $grandTotal = 0; @endphp
            @foreach($cart as $id => $item)
            @php $subtotal = $item['price'] * $item['quantity']; $grandTotal += $subtotal; @endphp
            <div class="col-lg-12 mb-3">
                <div class="d-flex justify-content-between align-items-center border p-3 rounded">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['title'] }}" class="img-fluid" style="width: 80px; height: 100px; object-fit: cover;">
                        <div class="ms-3">
                            <h5>{{ $item['title'] }}</h5>
                            <p>Quantity: {{ $item['quantity'] }}</p>
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="mb-1">Price: ${{ $item['price'] }}</p>
                        <p class="mb-1">Subtotal: ${{ $subtotal }}</p>
                        <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-end mb-4">
            <h4>Total: ${{ $grandTotal }}</h4>
            <a href="#payment-form" class="btn btn-primary">Proceed to Payment</a>
        </div>
        @else
        <p>Your cart is empty.</p>
        @endif


        <form action="{{ route('checkout.store') }}" method="POST" id="payment-form" class="border p-4 rounded">
            @csrf
            {{-- بيانات العميل --}}
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Card Holder Name</label>
                <input type="text" id="card-holder-name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="card-element">Credit or Debit Card</label>
                <div id="card-element" class="w-full border border-gray-300 rounded px-3 py-3"></div>
                <div id="card-errors" class="text-red-600 text-sm mt-2"></div>
            </div>
            {{-- بيانات مخفية --}}
            <input type="hidden" name="payment_method" id="payment-method">
            <div class="mb-3">
                <button type="submit" id="card-button" class="btn btn-success w-100" data-secret="{{ $intent->client_secret }}"> Pay & Place Order </button>
            </div>
        </form>
    </section>
    <!-- CART / CHECKOUT AREA END -->

    <!-- NEW_COMICS, POPULAR, TEAM, REVIEWS, BLOG, FOOTER -->
    <x-main.footer />
    <x-main.script />

    @push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                const {
                    error,
                    paymentIntent
                } = await stripe.confirmCardPayment(clientSecret, {
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
</body>