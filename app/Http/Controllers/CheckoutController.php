<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = $this->getCart();

        if (empty($cart)) {
            return redirect()->route('books.index')->with('error', 'Your cart is empty!');
        }

        $total = $this->getCartTotal();
        $user = auth()->user();

        // تأكد من أن المستخدم لديه معرف Stripe
        if (!$user->hasStripeId()) {
            $user->createAsStripeCustomer();
        }

        // استخدم Stripe SDK بدلاً من Cashier
        Stripe::setApiKey(config('cashier.secret'));

        $intent = PaymentIntent::create([
            'amount' => $total * 100,
            'currency' => 'usd',
            'customer' => $user->stripe_id,
            'automatic_payment_methods' => [
                'enabled' => true,
                'allow_redirects' => 'never',
            ],
        ]);

        return view('checkout.index', [
            'cart' => $cart,
            'total' => $total,
            'intent' => $intent,
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'payment_method' => 'required|string',
        ]);

        $cart = $this->getCart();
        if (empty($cart)) {
            return redirect()->route('books.index')->with('error', 'Your cart is empty!');
        }

        $total = $this->getCartTotal();
        $user = auth()->user();

        try {
            // تأكد من أن لدى المستخدم حساب Stripe
            if (!$user->hasStripeId()) {
                $user->createAsStripeCustomer();
            }

            // تنفيذ الدفع
            $user->charge($total * 100, $request->payment_method);

            // إنشاء الطلب
            $order = Order::create([
                'user_id' => $user->id,
                'customer_name' => $request->name,
                'customer_address' => $request->address,
                'customer_phone' => $request->phone,
                'total_price' => $total,
                'status' => 'pending',
            ]);

            foreach ($cart as $bookId => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $bookId,
                    'quantity' => $item['quantity'],
                    'price_at_purchase' => $item['price'],
                ]);
            }

            session()->forget('cart');

            return redirect()->route('checkout.thankyou')->with('success', 'تم الدفع والطلب بنجاح!');
        } catch (\Exception $e) {
            \Log::error('Stripe Payment Error: ' . $e->getMessage());
            return back()->with('error', 'حدث خطأ أثناء الدفع: ' . $e->getMessage());
        }
    }

    protected function getCart()
    {
        return session()->get('cart', []);
    }

    public function getCartTotal()
    {
        $cart = $this->getCart();
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
