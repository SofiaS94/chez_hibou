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
            'id' => $item['id'],
            'name' => $item['name'],
            'price' => $item['price'],
            'quantity' => $quantity + 1,
            'picture' => $item['picture']

        ];
    }

    public function delete(int $id): void
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Supprimer l'élément correspondant de la session panier
            unset($_SESSION['cart'][$id]);
        }
    }
}
