<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */

    public function index(): string
    {
        $pageTitle = "Page d'accueil"; // titre de la page
        return $this->twig->render('Home/IndexNew.html.twig');
    }
}
