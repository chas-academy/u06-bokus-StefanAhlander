<?php

namespace App\Http\Controllers;

use App\CartModel;

/** Controller that basically does only one thing. Shows the welocome screen.
 *  The "getCart" method is used to get the number of items in the shopping cart
 *  to show in the navbar. It's present on all the controllers. If it was bigger
 *  I would have implemented it as a trait but because of it's small size the amount 
 *  of duplication feels irrelevant. 
 */
class MainController extends Controller
{
    public function index() {
        return view("welcome", ['cart' => $this->getCart()]);
    }

    public function getCart() {
        $cartModel = new CartModel();
        return $cartModel->getItemCount();
    }
}
