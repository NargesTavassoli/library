<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        $user_id = \Auth::user()->id;
        return  view('books', compact('books', 'user_id'));
    }
}
