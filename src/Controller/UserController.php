<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\UserManager;

use App\Model\FormManager;

class UserController extends AbstractController
{
    public function login(): string
    {
        $credentials = $_POST;
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $errors = FormManager::validateRegister();
                if (empty($errors)) {
                    $userManager = new UserManager();

                    $user = $userManager->selectOneByEmail($credentials['email']);

                    if (isset($user['password']) && password_verify($credentials['password'], $user['password'])) {
                        $_SESSION['user_id'] = $user['id'];
                        header('Location:/');
                        die();
                    } else {
                        $errors[] = "Le mot de pass ou l'adress mail est incorrect.";
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




    public function register(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = $_POST;
            $userManager = new UserManager();
            try {
                $_SESSION['user_id'] = $userManager->insert($credentials);
                header('Location:/');
                die();
            } catch (\Exception $e) {
                throw new \Exception('Failed to register' . $e->getMessage());
            }
        }
        return $this->twig->render('User/register.html.twig');
    }

    public function logout(): void
    {
        session_destroy();
        header('Location:/');
        die();
    }
}
