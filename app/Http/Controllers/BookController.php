<?php

namespace App\Http\Controllers;

use App\BookModel;
use App\CartModel;

/** Controller for all logic conserning books.
 * The method search will display a search form.
 * The method find will execute a search and pass the
 * results to the "search-results" view.
 * See MianController for the getCart method.
 */

class BookController extends Controller
{
    public function search() {
        return view("search", ['cart' => $this->getCart()]);
    }

    public function find() {
        $author = request('author');
        $title = request('title');

        /** A search where both fields are empty will show all the books in the store.
         * If the user fills out only one field the asumption is that he/she is looking for
         * results containg only that word/name.
         * 
         * If both fields are empty pass them to the Model. If any one field is empty replace it with
         * something that will not be found in the search, thereby limiting the results. If any field
         * contains data just pass it on.
         */
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
