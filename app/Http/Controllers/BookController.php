<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    public function search() {
        return view("search", []);
    }

    public function find() {
        $author = request('author');
        $title = request('title');

        $books = DB::table('books')
                    ->whereRaw('LOWER(author) like ?', ['%'.strtolower($author).'%'])
                    ->orWhereRaw('LOWER(title) like ?', ['%'.strtolower($title).'%'])
                    ->get();
 
        return view("search-results", ['books' => $books]);
    }

    
}
