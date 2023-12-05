<?php

namespace Gideon\Test;

use PDO;

readonly class TestModel
{
    public function __construct(private PDO $pdo)
    {
    }

    public function createUser(
        string $firstname,
        string $lastname,
        string $username,
        string $password
    ): int
    {
        $sql = 'INSERT INTO user (first_name, last_name, username, password) VALUES (:firstname, :lastname, :username, :password)';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':username' => $username,
            ':password' => $password
        ]);

        return $this->pdo->lastInsertId();
    }
}