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

        $bookModel = new BookModel();
 
        return view("search-results", ['books' => $bookModel->find($author, $title), 'cart' => $this->getCart()]);
    }
    
    public function getCart() {
        $cartModel = new CartModel();
        return $cartModel->getItemCount();
    }
}
