<?php

namespace App\Models;

use Config\DatabaseConnection;

class BaseModel
{
    protected \PDO $connection;

    function __construct()
    {
        $hostname = $_ENV['DB_HOST'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_NAME'];
        
        $connectionInstance = new DatabaseConnection($hostname, $username, $password, $dbname);
        $this->connection = $connectionInstance->getConnection();
    }
}
