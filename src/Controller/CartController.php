<?php

namespace App\Controller;

use App\Model\CartManager;
use App\Model\ItemManager;

class CartController extends AbstractController
{
    public function show()
    {

        $cart = $_SESSION['cart'];
        // var_dump($cart);
        // die;
        return $this->twig->render('cart/cart.html.twig', ['cart' => $cart]);
    }


    public function add($id)
    {

        $cartManager = new CartManager();
        $cartManager->add($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
