<?php

namespace App\Http\Controllers;

use App\BookModel;

class BookController extends Controller
{
    public function search() {
        return view("search", []);
    }

    public function find() {
        $author = request('author');
        $title = request('title');

        $bookModel = new BookModel();
 
        return view("search-results", ['books' => $bookModel->find($author, $title)]);
    } 
}
