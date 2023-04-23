<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\UserManager;
use Exception;

class UserController extends AbstractController
{
    public function login(): string
    {
        $credentials = $_POST;
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if ($this->validate($credentials)) {
                    $userManager = new UserManager();
                    $user = $userManager->selectOneByEmail($credentials['email']);

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

    public function register(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = $_POST;
            $userManager = new UserManager();
            try {
                $userManager->insert($credentials);
                return $this->login();
            } catch (\Exception $e) {
                throw new \Exception('Failed to register' . $e->getMessage());
            }
        }
        return $this->twig->render('User/register.html.twig');
    }
}
