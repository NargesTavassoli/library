<?php namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

    }

    public function relation($id = 1)
    {
//        $book = Book::find($id);
//        $result = $book->stock;

//        $user = User::find($id);
//        $result = $user->books;
//        dd($result[2]->user()->value('email'));


        $book = Book::find($id);
//        dd($book);

//        $user = User::find($id);
//        $result = $book->ratings()->get()->toArray();

//        $result = Book::withCount('ratings')->get()->toArray();

//        $result = User::with('books')->get();

        $result = $book->stock->update(['number' => 20]);
        dd($result);
    }

    public function paginate($user_id = 1)
    {
//        $user = User::find($id);
        $books = Book::paginate(4);
//        $books = $user->books()->paginate(2);
//        dd($books);
//        return $books;
        return  view('books', compact('books', 'user_id'));
    }
}
