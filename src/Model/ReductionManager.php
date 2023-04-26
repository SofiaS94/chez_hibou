<?php

namespace App\Model;

class ReductionManager extends AbstractManager
{
    public const TABLE = 'reductions';

    public function findReductions(?string $code = null)
    {
        // prepared request
        if (null === $code) {
            return null;
        }
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE code=:code");
        $statement->bindValue('code', $code, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }
}
