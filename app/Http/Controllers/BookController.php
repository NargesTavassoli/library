<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function paginate($user_id = 1)
    {
        $books = Book::simplePaginate(4);
//        $books = Book::all();
        return  view('books', compact('books', 'user_id'));
    }
}
