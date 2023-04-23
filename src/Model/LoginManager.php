<?php

namespace App\Model;

use App\Model\AbstractManager;

class LoginManager extends AbstractManager
{
    public const TABLE = 'customer';
    public function checkLogin(string $mail, string $password): bool
    {
        // Préparation de la requête
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE mail=:mail");
        $statement->bindValue('mail', $mail, \PDO::PARAM_STR);
        $statement->execute();

        $customer = $statement->fetch();

        if (!$customer) {
            // L'email n'a pas été trouvé dans la table
            return false;
        }

        // Vérification du mot de passe
        if (password_verify($password, $customer['password'])) {
            // Le mot de passe correspond

            // Démarrage de la session
            session_start();

            // Enregistrement des données de l'utilisateur dans la session
            $_SESSION['user_id'] = $customer['id'];
            $_SESSION['user_mail'] = $customer['mail'];

            header('Location:/welcome.html.twig');
            exit;
        }

        // Le mot de passe ne correspond pas
        return false;
    }
}
