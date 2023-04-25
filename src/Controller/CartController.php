<?php

namespace App\Controller;

use App\Model\CartManager;
use App\Model\ItemManager;

class CartController extends AbstractController
{
    public function show()
    {
    //   var_dump($_SESSION['cart']);
        return $this->twig->render('cart/cart.html.twig');
    }

    public function add($id)
    {

        $cartManager = new CartManager();
        $cartManager->add($id);
        // return $this->twig->render('cart/cart.html.twig');
    }
}
