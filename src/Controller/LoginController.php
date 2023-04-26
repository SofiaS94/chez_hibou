<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\LoginManager;

class LoginController extends AbstractController
{


    public function login(): string
    {
        $credentials = $_POST;
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if ($this->validate($credentials)) {
                    $loginManager = new LoginManager();
                    $user = $loginManager->selectOneByEmail($credentials['email']);

                    $password = $user['password'];
                    if (password_verify($credentials['password'], $password)) {
                        $_SESSION['user_id'] = $user['id'];
                    }
                }
            } catch (\Exception $exception) {
                $errors[] = $exception->getMessage();
            }
        }
        return  $this->twig->render('User/login.html.twig', [
            'errors' => $errors
        ]);
    }


    public function validate(array $credentials){


    }




}
