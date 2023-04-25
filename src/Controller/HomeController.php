<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */

    public function index(): string
    {
        // session_destroy();
        // session_start();
        return $this->twig->render('Home/index.html.twig');
    }

    public function restaurant(): string
    {
        return $this->twig->render('Restaurant/presentation.html.twig');
    }
}
