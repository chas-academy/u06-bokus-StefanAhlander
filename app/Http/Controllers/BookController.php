<?php

namespace App\Http\Controllers;

use App\BookModel;
use App\CartModel;
use GuzzleHttp\Client;

/** Controller for all logic conserning books.
 * The method search will display a search form.
 * The method find will execute a search and pass the
 * results to the "search-results" view.
 * See MianController for the getCart method.
 */

class BookController extends Controller
{
    /*     public function index()
        {
    
        }
    
        public function show(id)
        {
    
        } */

    public function tips()
    {
        $api_key = config('api.api-key');
        $client = new Client();
        $response = $client->request(
            'GET',
            'https://api.nytimes.com/svc/books/v3/lists/current/hardcover-fiction.json?api-key='.$api_key
        );

        if ($response->getStatusCode() != 200) {
            return abort(404);
        }

        $data = json_decode($response->getBody());
        $books = $data->results->books;
        
        return view("recommendations", [
            'books' => $books,
             'cart' => $this->getCart()
            ]
        );
    }

    public function search()
    {
        return view("search", ['cart' => $this->getCart()]);
    }

    public function find()
    {
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
        if (is_null($author) && is_null($title)) {
        } else {
            $author = (!is_null($author)) ? $author : 'string that for sure is not in the books-table';
            $title = (!is_null($title)) ? $title : 'string that for sure is not in the books-table';
        }

        $bookModel = new BookModel();
 
        return view("search-results", ['books' => $bookModel->find($author, $title), 'cart' => $this->getCart()]);
    }
    
    public function getCart()
    {
        $cartModel = new CartModel();
        return $cartModel->getItemCount();
    }
}
