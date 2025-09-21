<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $user = $request->user();
        if ($user->bookmarks()->where('book_id', $book->id)->exists()) {
            return back();
        }
        $user->bookmarks()->create(['book_id' => $book->id]);
return redirect()->route('bookmarks.index')->with('success', 'Book bookmarked!');
    }
  public function destroy(Request $request, Bookmark $bookmark)
{
    $user = $request->user();

    if ($bookmark->user_id === $user->id) {
        $bookmark->delete();
        return back()->with('success', 'Bookmark removed!');
    }

    return back()->with('error', 'Bookmark not found!');
}




    public function index(Request $request)
    {
        $bookmarks = $request->user()->bookmarks()->with('book')->get();

        return view('bookmarks.index', compact('bookmarks'));
    }
}
