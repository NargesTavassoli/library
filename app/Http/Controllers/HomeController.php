<?php namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

    }

    public function relation($id = 7)
    {
//        $book = Book::find($id);
//        $result = $book->stock;

        $user = User::find($id);
        $result = $user->books;
        dd($result[2]->user()->value('email'));

    }
}
