<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookListController extends Controller
{
    public function index()
    {
        //$books = Book::all();
        $books = DB::table('books')
            ->join('users', 'books.create_user', '=', 'users.id')
            ->select('books.*', 'users.id', 'users.name')
            ->get();
        return view('bookList', ['books' => $books]);
    }
}
