<?php

namespace App\Model;

<<<<<<< HEAD
class CartManager extends AbstractManager
{
=======

class CartManager extends AbstractManager
{

>>>>>>> 5dc9b06da280365d58a091e4cb34ab035bb6eba4
    /**
     * Add a new item in the cart
     */
    public function add(int $id)
    {

        $itemManager = new ItemManager();

<<<<<<< HEAD
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_GET['id'])) {
=======
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
>>>>>>> 5dc9b06da280365d58a091e4cb34ab035bb6eba4
            $id = $_GET['id'];
        }
         // récupérer le produit en BD
         $item = $itemManager->selectOneById($id);
<<<<<<< HEAD

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
=======
         
        if (isset($_SESSION['cart'][$id]))
        {
            $_SESSION['cart'][$id]++;   
        } else {
            $_SESSION['cart'][$id] = 1; 
>>>>>>> 5dc9b06da280365d58a091e4cb34ab035bb6eba4
        }
        // var_dump($_SESSION['cart']);
        // // Récupérer le panier depuis la session ou le créer s'il n'existe pas encore
        // // $cart = $request->getSession()->get('cart', []);
        // if(!isset($_SESSION['cart']))
        // {
        //     $_SESSION['cart'] = [];
<<<<<<< HEAD
        // }
=======
        // } 
>>>>>>> 5dc9b06da280365d58a091e4cb34ab035bb6eba4
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
