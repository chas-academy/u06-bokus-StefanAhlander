<?php

namespace App\Http\Controllers;

use App\CartModel;


class CartController extends Controller
{
    
    public function index() {
        $cartModel = new CartModel();
        $books = $cartModel->getAll();

        $total = 0;
        foreach($books as $book) {
            $total += $book->price * $book->amount;
        }

        return view("shopping-cart", ['books' => $books, 'total' => $total, 'cart' => $this->getCart()]);    
    }

    public function update() {
        request()->validate([
            ['book_id' => 'integer'],
            ['amount' => 'integer']
        ]);

        $list = request()->all();
        $cartModel = new CartModel();

        foreach ($list as $key => $value) {
            if($key === "_token") continue;
            if($value > 0) {
                $cartModel->updateCart($key, $value);
            }
        }

        return redirect('/cart');
    }

    public function destroy() {
        $cartModel = new CartModel();
        $cartModel->deleteCart();

        return view('deleted-cart', ['cart' => $this->getCart()]);
    }

    public function checkout() {
        $cartModel = new CartModel();
        $cartModel->deleteCart();

        return view('checked-out', ['cart' => $this->getCart()]);
    }

    public function getCart() {
        $cartModel = new CartModel();
        return $cartModel->getItemCount();
    }
}
