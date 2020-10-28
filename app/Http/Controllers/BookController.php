<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    // 画面遷移時
    public function index()
    {
        // ログイン情報取得
        $user = Auth::user();

        $books = DB::table('books')
            ->join('users', 'books.create_user', '=', 'users.id')
            ->select('books.*', 'users.id', 'users.name')
            ->where('users.id', $user->id)
            ->get();

        return view('books', ['books' => $books]);
    }


    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ])->validate();

        // ログイン情報取得
        $user = Auth::user();

        // 項目設定
        $book = new Book;
        $book->title = $request->name;
        $book->create_user = $user->id;

        $book->save();

        return redirect('/');
    }

    public function delete(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
}
