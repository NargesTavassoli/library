<?php namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

    }

    public function relation($id = 1)
    {
        $book = Book::find($id);
        $result = $book->stock;

        dd($result->book);

    }
}
