<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/** Model handeling all database access regarding the cart table.
 *  The method getAll will display everything in the cart.
 *  updateCart will add rows to the cart table representing items in the cart.
 *  deleteCart will empty the table/cart.
 *  getItemCount will return the number of items in the cart by counting the
 *  amount of each book represented. Used for showing content of the cart in
 *  the navbar.
 */

class CartModel extends Model
{
    public function getAll() {
        return DB::table('cart')
        ->join('books', 'cart.book_id', '=', 'books.id')
        ->select('books.id', 'books.author', 'books.title', 'books.price', 'cart.amount')
        ->get();
    }

    public function updateCart(String $key, $value) {
        DB::table('cart')
            ->updateOrInsert(
                ['book_id' => $key],
                ['amount' => $value]
            );
    }

    public function deleteCart() {
        DB::table('cart')->delete();
    }

    public function getItemCount() {
        return DB::table('cart')->sum('amount');
    }
}
