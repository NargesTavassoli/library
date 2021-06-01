<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Book;
use App\Models\Rating;
use App\Models\Stock;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        Activity::all();
    }

    public function index()
    {
        $books = Book::where('validation', '=', 1)->simplePaginate(4);
        $ratings = Rating::all();
        $stock = Stock::all();

        return view('book.books', compact('books', 'ratings', 'stock'));
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
            return redirect()->route("book.create")->with("successCreate", true);
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
        return view('book.edit', compact('book'));
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        if (\Gate::allows('delete', $book)) ;
        {
            $book->delete();
        }
        return redirect()->back();
    }

    public function history()
    {
        $logs = ActivityLog::query()->orderBy('created_at', 'DESC')->get();
        return view('book.history', compact('logs'));
    }

    public function rating(Request $request, $book_id)
    {
        if ($request->isMethod('post')) {
            $user_id = \Auth::user()->id;
            $rate = Rating::where('user_id', '=', $user_id)->where('book_id', '=', $book_id);
            if($rate->exists()){
                $rate->update([
                    'rate' => $request->rate,
                ]);
            } else {
                $rate = new Rating;
                $rate->create([
                    'book_id' => $book_id,
                    'user_id' => $user_id,
                    'rate' => $request->rate,
                ]);
            }
        }
        return redirect()->back();
    }

}
