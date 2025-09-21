<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        return view('cart.index', compact('cart'));
    }
    public function add($id)
    {
        $book = Book::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'title' => $book->title,
                'price' => $book->price,
                'image' => $book->image,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
    return redirect()->route('cart.index')->with('success', '📚 Book added to cart!');
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Book romoved from cart');
    }
    public function update(Request $reqest, $id)
    {
        $reqest->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $reqest->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Book updated to cart');
    }
}
