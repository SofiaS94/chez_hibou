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


    public function validate(array $credentials)
    {
        $credentials = $_POST;
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = []; // Initialize an empty array to store validation errors

        // Extract email and password from the $credentials array
        $email = isset($credentials['email']) ? trim($credentials['email']) : '';
        $password = isset($credentials['password']) ? trim($credentials['password']) : '';

        // Perform validation checks
        if (empty($email)) {
            $errors[] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email is not valid.';
        }

        if (empty($password)) {
            $errors[] = 'Password is required.';
        }

        // Return the validation errors array, or null if no errors
        return !empty($errors) ? $errors : null;
    }
}

   /* if (empty($email)) {
                $errors['email'] = "L'email est obligatoire.";
            }
            if (empty($password)) {
                $errors['password'] = 'Le mot de pass est obligatoire.';
            }
            if (empty($errors)) {
                $user = $loginManager->checkLogin($email, $password);
                if (!$user) {
                    $errors['email'] = 'L\'email ou mot de pass est incorrect. ';
                } elseif (!password_verify($password, $user['password'])) {
                    $errors['email'] = 'L\'email ou mot de pass est incorrect. ';
                }
            }*/
