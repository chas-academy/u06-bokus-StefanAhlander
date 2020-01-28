<?php

namespace App\Http\Controllers;

use App\CartModel;

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
