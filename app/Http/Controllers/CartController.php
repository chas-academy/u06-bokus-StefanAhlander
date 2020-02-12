<?php

namespace App\Http\Controllers;

use App\CartModel;

/** Controller handeling all logic regarding the shopping cart.
 *  The index method will call the Model and then pass the result to the view.
 *  update will iterate over all the books passed in the form, check if any of them are
 *  ordered and how many, for every ordered book the updateCart method of the Model will be called.
 *  destroy will empty the cart.
 *  checkout will empty the cart and display a shippment message.
 *
 */

class CartController extends Controller
{
    public function index()
    {
        $cartModel = new CartModel();
        $books = $cartModel->getAll();

        /** Calculate total cost of all books in the cart. */
        $total = 0;
        foreach ($books as $book) {
            $total += $book->price * $book->amount;
        }

        return view("shopping-cart", ['books' => $books, 'total' => $total, 'cart' => $this->getCart()]);
    }

    public function update()
    {
        request()->validate([
            ['book_id' => 'integer'],
            ['amount' => 'integer']
        ]);

        $list = request()->all();
        $cartModel = new CartModel();

        /** Iterate over all form fields. If a field contains a positive value for amount ordered
         *  pass it on the the Model to add to the cart.
         */
        foreach ($list as $key => $value) {
            if ($key === "_token") {
                continue;
            }
            if ($value > 0) {
                $cartModel->updateCart($key, $value);
            }
        }

        return redirect('/cart');
    }

    public function destroy()
    {
        $cartModel = new CartModel();
        $cartModel->deleteCart();

        return view('deleted-cart', ['cart' => $this->getCart()]);
    }

    public function checkout()
    {
        $cartModel = new CartModel();
        $cartModel->deleteCart();

        return view('checked-out', ['cart' => $this->getCart()]);
    }

    public function getCart()
    {
        $cartModel = new CartModel();
        return $cartModel->getItemCount();
    }
}
