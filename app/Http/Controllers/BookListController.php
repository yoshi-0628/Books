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
        $books = Book::join('users', 'books.create_user', '=', 'users.id')
            ->select('books.*', 'users.id', 'users.name')
            ->orderByRaw('books.created_at DESC')
            ->paginate(10);

        return view('bookList', ['books' => $books]);
    }
    public function search(Request $request)
    {
        $books = DB::table('books')
            ->join('users', 'books.create_user', '=', 'users.id')
            ->select('books.*', 'users.id', 'users.name')
            ->where('books.title', 'like', "%$request->name%")
            ->orderByRaw('books.created_at DESC')
            ->get();
        return view('bookList', ['books' => $books]);
    }
}
