<?php

namespace Config;

class DatabaseConnection
{
    private \PDO $connection;

    function __construct(string $hostname, string $username, string $password, string $dbname)
    {
        $dbconnection = $_ENV['DB_CONNECTION'] ?? 'mysql';
        try {
            $dsn = "mysql:host=$hostname;port=3306;dbname=$dbname";
            $this->connection = new \PDO($dsn, $username, $password, [
                \PDO::MYSQL_ATTR_SSL_CA => '/etc/ssl/certs/ca-certificates.crt',
                \PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true,
            ]);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // echo "Connected to database successfully";
        } catch (\PDOException $e) {
            die("Database Error: " . $e->getMessage() . "<br />" . $e->getTraceAsString());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
