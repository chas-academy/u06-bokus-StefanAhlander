<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
