<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $validator = Validator::make($request -> all(),[
            'name' => 'required|max:255',
        ])->validate();
    

        $book = new Book;
        $book->title = $request->name;
        $book->save();
    
        return redirect('/');
    }

    public function delete(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
}
