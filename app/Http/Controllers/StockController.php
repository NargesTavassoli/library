<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Stock;


class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validation()
    {
        $books = Book::simplePaginate(4);
        $stock = Stock::all();

        return view('book.validation', compact('books', 'stock'));

    }
}
