<?php

namespace App\Http\Controllers;

use App\BookModel;
use App\CartModel;

class BookController extends Controller
{
    public function search() {
        return view("search", ['cart' => $this->getCart()]);
    }

    public function find() {
        $author = request('author');
        $title = request('title');

        if(is_null($author) && is_null($title)) {

        } else {
            $author = (!is_null($author)) ? $author : 'string that for sure is not in the books-table';
            $title = (!is_null($title)) ? $title : 'string that for sure is not in the books-table';
        }


        $bookModel = new BookModel();
 
        return view("search-results", ['books' => $bookModel->find($author, $title), 'cart' => $this->getCart()]);
    }
    
    public function getCart() {
        $cartModel = new CartModel();
        return $cartModel->getItemCount();
    }
}
