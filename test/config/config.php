<?php
/**
 * Database Config
 */
return [
    "database" => [
        "host" => $_ENV['DATABASE_HOST'],
        "port" => 3306,
        "username" => $_ENV['DATABASE_USERNAME'],
        "password" => $_ENV['DATABASE_PASSWORD'],
        "database" => $_ENV['DATABASE_NAME']
    ]
];