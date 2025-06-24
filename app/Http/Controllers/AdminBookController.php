<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('admin.books.index', compact('books'));
    }
    public function create()
    {
        return view('admin.books.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);
        $data = $request->only('title', 'price', 'author');
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('title', 'price', 'author');

        if ($request->hasFile('image')) {
            if ($book->image) {
                $oldImagePath = public_path('images/' . $book->image);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }

            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }
    public function destroy(Book $book)
    {
        if ($book->image) {
            $oldImagePath = public_path('images/' . $book->image);
            if (file_exists($oldImagePath)) {
                @unlink($oldImagePath);
            }
        }
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book Deleted successfully.');
    }
}
