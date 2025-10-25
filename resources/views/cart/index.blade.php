<!DOCTYPE html>
<html lang="en">


<x-main.head />

<body>
    @php
    use App\Models\Book;

$books = Book::latest()->paginate(3);
    @endphp
    <!-- perloader -->
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
    <!-- preloader -->

    <!-- HEADER AREA START -->
    <x-main.header />

    <!-- right-menu modal -->
    <x-main.menu />
    <!-- contact modal -->
    <x-main.contact />

    <!-- HEADER AREA ENDS -->


    <!-- cart -->
   
    <section id="page-title">
        <div id="backtotop">
            <a href="#page-title" id="backtotop-value"><i class="fa-solid fa-arrow-up"></i></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Add to Cart</span>
                            <h3>Checkout The Cart Page.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  @php $grandTotal = 0; @endphp

<section id="cart">
    <div class="container">
        @if(count($cart) > 0)
            <div class="row cart-main">
                @foreach ($cart as $id => $item)
                    @php
                        $total = $item['price'] * $item['quantity'];
                        $grandTotal += $total;
                    @endphp
                    <div class="col-lg-12">
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-lg-1 col-md-12 tablet-hide">
                                    <h4>{{ $loop->iteration }}</h4>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <img src="{{ asset('images/' . ($item['image'] ?? 'default-book.png')) }}" alt="{{ $item['title'] }}" class="img-fluid">
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <span>Comic Name</span>
                                    <h3>{{ $item['title'] }}</h3>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <span>Quantity</span>
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="inline-flex">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control">
                                        <button type="submit" class="button-primary" style="padding:10px 15px; margin-top:10px">
                                            Update
                                        </button>
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <span>Price</span>
                                    <h3>${{ $item['price'] }}</h3>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <span>Action</span>
                                    <a href="{{ route('cart.remove', $id) }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                                <div class="col-lg-1 col-md-1 tablet-hide">
                                    <span>Subtotal</span>
                                    <h3>${{ $total }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row pt-5">
                <div class="col-4 col-lg-6 cart-footer">
                 Total amount: ${{ $grandTotal }}
                </div>
                <div class="col-8 col-lg-6 text-end">
                    <a href="/checkout" class="button-primary">Pay ${{ $grandTotal }}</a>
                </div>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
   
</section>

    <!-- cart -->

    <!-- FOOTER AREA START -->
    <x-main.footer />
    <!-- FOOTER AREA END -->



    <!-- JavaScript -->
    <x-main.script />
</body>


<!-- Mirrored from epiktheme.com/demos/html/comixo_live_preview/demos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 03:52:57 GMT -->

</html>