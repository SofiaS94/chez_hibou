<?php

namespace App\Model;

use App\Model\AbstractManager;

class UserManager extends AbstractManager
{
    public const TABLE = 'customer';
    public function selectOneByEmail(string $email)
    {
        $query = "select * from " . static::TABLE . " where email=:email";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('email', $email, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }

    public function insert(array $credentials): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . static::TABLE .
            " (`email`, `password`, `address`, `adress_2`, `firstname`, `lastname`, `phone_number`, `dob`)
        VALUES (:email, :password, :address, :adress_2, :firstname, :lastname, :phone_number, :dob)");
        $statement->bindValue(':email', $credentials['email']);
        $statement->bindValue(':password', password_hash($credentials['password'], PASSWORD_DEFAULT));
        $statement->bindValue(':address', $credentials['address'] ?? '');
        $statement->bindValue(':firstname', $credentials['firstname']);
        $statement->bindValue(':lastname', $credentials['lastname']);
        $statement->bindValue(':adress_2', $credentials['adress_2'] ?? '');
        $statement->bindValue(':phone_number', $credentials['phone_number'] ?? '');
        $statement->bindValue(':dateOfBirth', $credentials['dateOfBirth'] ?? '');
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
