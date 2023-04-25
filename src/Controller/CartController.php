<?php

namespace App\Controller;

use App\Model\CartManager;
use App\Model\ItemManager;

<<<<<<< HEAD
class CartController extends AbstractController
{
=======

class CartController extends AbstractController
{


>>>>>>> 5dc9b06da280365d58a091e4cb34ab035bb6eba4
    public function show()
    {
    //   var_dump($_SESSION['cart']);
        return $this->twig->render('cart/cart.html.twig');
<<<<<<< HEAD
=======

>>>>>>> 5dc9b06da280365d58a091e4cb34ab035bb6eba4
    }

    public function add($id)
    {
<<<<<<< HEAD

=======
      
>>>>>>> 5dc9b06da280365d58a091e4cb34ab035bb6eba4
        $cartManager = new CartManager();
        $cartManager->add($id);
        // return $this->twig->render('cart/cart.html.twig');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 5dc9b06da280365d58a091e4cb34ab035bb6eba4
