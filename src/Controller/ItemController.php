<?php

namespace App\Controller;

use App\Model\ItemManager;

class ItemController extends AbstractController
{
    /**
     * List all items dans food
     */
    public function list(): string
    {
        $itemManager = new ItemManager();
        $items = $itemManager->selectAll();

        return $this->twig->render('Item/index.html.twig', ['items' => $items]);
    }

    /**
     * List all items dans food
     */
    public function listByType(string $typeName = 'entree'): string
    {
        // Récupérer le type de plat sélectionné depuis les paramètres de requête HTTP
        $typeName = $_GET['type'] ?? 'entree'; // Utiliser 'entree' comme valeur par défaut

        $itemManager = new ItemManager();
        $items = $itemManager->selectByType($typeName);

        // Renvoyer la réponse sous forme de vue générée avec les items récupérés
        return $this->twig->render('Item/' . $typeName . '.html.twig', ['items' => $items]);
    }

    /**
     * Add a new item in the cart
     */
    public function add(int $id, $request)
    {

        $itemManager = new ItemManager();

        // récupérer le produit en BD
        $item = $itemManager->selectOneById($id);

        // Récupérer le panier depuis la session ou le créer s'il n'existe pas encore
        $cart = $request->getSession()->get('cart', []);

        // Ajouter le produit dans le panier
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
            'product' => $item,
            'quantity' => 1,
            ];

        // Stocker le panier dans la session
            $request->getSession()->set('cart', $cart);

            return $this->twig->render('/cart');
        }
    }
}

    /**
     *
     */

    /**
     * Show informations for a specific item
     */
    // public function show(int $id): string
    // {
    //     $itemManager = new ItemManager();
    //     $item = $itemManager->getById($id);

    //     return $this->twig->render('Item/show.html.twig', ['name' => $item]);
    // }



    //  * /Edit a specific item
    //  */
    // public function edit(int $id): ?string
    // {
    //     $itemManager = new ItemManager();
    //     $item = $itemManager->selectOneById($id);

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // clean $_POST data
    //         $item = array_map('trim', $_POST);

    //         // TODO validations (length, format...)

    //         // if validation is ok, update and redirection
    //         $itemManager->update($item);

    //         header('Location: /items/show?id=' . $id);

    //         // we are redirecting so we don't want any content rendered
    //         return null;
    //     }

    //     return $this->twig->render('Item/edit.html.twig', [
    //         'item' => $item,
    //     ]);
    // }


    // /**
    //  * Delete a specific item
    //  */
    // public function delete(): void
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $id = trim($_POST['id']);
    //         $itemManager = new ItemManager();
    //         $itemManager->delete((int)$id);

    //         header('Location:/items');
    //     }
    // }
