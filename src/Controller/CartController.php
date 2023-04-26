<?php

namespace App\Controller;

use App\Model\CartManager;
use App\Model\ReductionManager;

class CartController extends AbstractController
{
    public function show(?string $code = null)
    {
        $cart = $_SESSION['cart'] ?? [];

        $totalReduction = 0;
        $amount = 0;
        foreach ($_SESSION['cart'] as $product) {
            $amount += $product['price'] * $product['quantity'];
        }

        if ($code !== null && (empty($_SESSION['reductions']) || $code !== $_SESSION['reductions']['code'])) {
            $reductionManager = new ReductionManager();
            $_SESSION['reductions'] = $reductionManager->findReductions($code);
        }
        if (!empty($_SESSION['reductions'])) {
            $totalReduction = $amount * $_SESSION['reductions']['pourcentage'] / 100;
        }

        return $this->render('cart/cart.html.twig', ['cart' => $cart, 'montant' => $amount,
        'totalReduction' => $totalReduction]);
    }



    public function add($id)
    {

        $cartManager = new CartManager();
        $cartManager->add($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $cartManager = new CartManager();
        $cartManager->delete($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
