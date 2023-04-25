<?php

namespace App\Model;

class CartManager extends AbstractManager
{
    /**
     * Add a new item in the cart
     */
    public function add(int $id)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        // récupérer le produit en BD
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);
        $quantity = $_SESSION['cart'][$id]['quantity'] ?? 0;
        $_SESSION['cart'][$id] = [
            'name' => $item['name'],
            'price' => $item['price'],
            'quantity' => $quantity + 1
        ];
        // if (isset($_SESSION['cart'][$id])) {
        //     var_dump($_SESSION, $id, $item);die;
        //     $_SESSION['cart'][$id]['quantity']++;
        // } else {
        //     $_SESSION['cart'][$id] = [
        //         'quantity' => 1,
        //         'name' => $item['name'],
        //         'price' => $item['price']
        //     ];
        // }
    }
}
