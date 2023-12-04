<?php

namespace Gideon\Test;

use PDO;

readonly class Database
{
    public function __construct(private array $config)
    {
    }

    public function connect(): PDO
    {
        $host = $this->config['database']['host'];
        $database = $this->config['database']['database'];
        $username = $this->config['database']['username'];
        $password = $this->config['database']['password'];

        return new PDO(
            "mysql:host=$host;dbname=$database",
            $username,
            $password
        );
    }
}