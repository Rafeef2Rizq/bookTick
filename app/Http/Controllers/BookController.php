<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::all();
        return view('books.index',compact('books'));
    }

 
    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
           return view('books.show', compact('book'));

    }
public function rate(Request $request ,Book $book){
$request->validate([
    'rating'=>['required','integer','min:1','max:5']
]);
$book->ratings()->updateOrCreate(
    ['user_id'=>auth()->id()],
    ['rating'=>$request->rating]
);
    return back()->with('success', 'Thank you for rating!');

}
   

  
}
