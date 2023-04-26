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
            " (`email`, `password`, `address`, `adress_2`, `firstname`, `lastname`, `phone_number`, `dateOfBirth`)
        VALUES (:email, :password, :address, :adress_2, :firstname, :lastname, :phone_number, :dateOfBirth)");
        $statement->bindValue('email', $credentials['email']);
        $statement->bindValue('password', password_hash($credentials['password'], PASSWORD_DEFAULT));
        $statement->bindValue('address', $credentials['address'] ?? null);
        $statement->bindValue('firstname', $credentials['firstname'] ?? null);
        $statement->bindValue('lastname', $credentials['lastname'] ?? null);
        $statement->bindValue('adress_2', $credentials['adress_2'] ?? null);
        $statement->bindValue('phone_number', $credentials['phone_number'] ?? null);
        $statement->bindValue('dateOfBirth', $credentials['dateOfBirth'] ?? null);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }


    public function update(array $credentials): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET `address` = :address, `firstname` = :firstname, `lastname` = :lastname, `dateOfBirth` = :dateOfBirth WHERE id = :id");
        $statement->bindValue('address', $credentials['address'] ?? null);
        $statement->bindValue('firstname', $credentials['firstname'] ?? null);
        $statement->bindValue('lastname', $credentials['lastname'] ?? null);
        // $statement->bindValue('adress_2', $credentials['adress_2'] ?? null);
        $statement->bindValue('dateOfBirth', $credentials['dateOfBirth'] ?? null);
        $statement->bindValue('id', $credentials['id']);
        $result = $statement->execute();
        return $result;
    }
}
