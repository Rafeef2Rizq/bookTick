<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = $this->getCart();
        if (empty($cart)) {
            return redirect()->route('books.index')->with('error', 'Your cart is empty!');
        }
        $total = $this->getCartTotal();
        return view('checkout.index', compact('cart', 'total'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);
        $cart = $this->getCart();
        if (empty($cart)) {
            return redirect()->route('books.index')->with('error', 'Your cart is empty!');
        }
        $total = $this->getCartTotal();
        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $request->name,
            'customer_address' => $request->address,
            'customer_phone' => $request->phone,
            'total_price' => $total,
            'status' => 'pending',
        ]);
         // حفظ كل كتاب في order_items
        foreach ($cart as $bookId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $bookId,
                'quantity' => $item['quantity'],
                'price_at_purchase' => $item['price'],
            ]);
        }
         // تفريغ السلة من السيشن
        session()->forget('cart');

    return redirect()->route('checkout.thankyou');
    
    }
    // دالة للحصول على السلة
    protected function getCart()
    {
        return session()->get('cart', []);
    }
    // دالة لحساب عدد العناصر في السلة
    public function getCartCount()
    {
        $cart = $this->getCart();
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }
    // دالة لحساب المجموع الكلي
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
