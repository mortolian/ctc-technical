<?php

namespace Gideon\Test;

use PDO;

readonly class TestModel
{
    public function __construct(private PDO $pdo)
    {
    }

    public function authUser(
        string $username,
        string $password
    )
    {
        $sql = 'SELECT * FROM user WHERE username = :username LIMIT 1';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':username' => $username
        ]);

        $result = $statement->fetch();

        if ($result) {
            if (!password_verify($password, $result['password'])) return false;
        }

        $_SESSION['user'] = $result;

        return $result;
    }

    public function hasAuth(): bool
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    public function getUserSession(): array
    {
        return $_SESSION['user'];
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

    public function getPolls(): array
    {
        $response = [];

        $sql = 'SELECT * FROM user WHERE username = :username LIMIT 1';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':username' => $username
        ]);

        $result = $statement->fetch();

        return [];
    }
}