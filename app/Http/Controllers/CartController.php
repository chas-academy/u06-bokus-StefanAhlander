<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function update() {
        request()->validate([
            ['book_id' => 'integer'],
            ['amount' => 'integer']
        ]);

        $list = request()->all();

        foreach ($list as $key => $value) {
            if($key === "_token") continue;
            if($value > 0) {
                DB::table('cart')
                    ->updateOrInsert(
                        ['book_id' => $key],
                        ['amount' => $value]
                    );
            }
        }

        return redirect('/buy');
    }

    public function show() {
        $books = DB::table('cart')
        ->join('books', 'cart.book_id', '=', 'books.id')
        ->select('books.id', 'books.author', 'books.title', 'books.price', 'cart.amount')
        ->get();

        return view("shopping-cart", ['books' => $books]);    }
}
