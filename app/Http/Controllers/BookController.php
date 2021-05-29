<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::simplePaginate(4);
        $ratings = Rating::all();
        $user_id = \Auth::user()->id;
        return view('book.books', compact('books', 'user_id', 'ratings'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $book = new Book();
            $book->create([
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'year' => $request->year,
                'price' => $request->price,
                'user_id' => \Auth::user()->id
            ]);
            return redirect()->route("book.create")->with("successCreate",true);

        }
            return view('book.create');
    }

    public function edit(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        if ($request->isMethod('post')) {
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'year' => $request->year,
                'price' => $request->price,
            ]);
            return redirect('/home');

        }
        return  view('book.edit', compact('book'));
    }


}
