<?php

namespace App\Model;

class FormManager
{
    public static function validateRegister(): array
    {


        $errors = []; // Initialize an empty array to store validation errors

        // Extract email and password from the $_POST array
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

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
        return $errors;
    }
}
