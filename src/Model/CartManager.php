<?php

namespace App\Model;


class CartManager extends AbstractManager
{

    /**
     * Add a new item in the cart
     */
    public function add(int $id)
    {

        $itemManager = new ItemManager();

        if (!isset($_SESSION))
        {
            session_start();
        }
        if (!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = [];
        }
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
         // récupérer le produit en BD
         $item = $itemManager->selectOneById($id);
         
        if (isset($_SESSION['cart'][$id]))
        {
            $_SESSION['cart'][$id]++;   
        } else {
            $_SESSION['cart'][$id] = 1; 
        }
        // var_dump($_SESSION['cart']);
        // // Récupérer le panier depuis la session ou le créer s'il n'existe pas encore
        // // $cart = $request->getSession()->get('cart', []);
        // if(!isset($_SESSION['cart']))
        // {
        //     $_SESSION['cart'] = [];
        // } 
        // $cart = $_SESSION['cart'];

        // // Ajouter le produit dans le panier
        // if (isset($cart[$id])) {
        //     $cart[$id]['quantity']++;
        // } else {
        //     $cart[$id] = [
        //         'product' => $item,
        //         'quantity' => 1,
        //     ];

        //     // Stocker le panier dans la session
        //     // $request->getSession()->set('cart', $cart);
        // }
    }
}
