<?php

namespace App\Models;

class User extends BaseModel {

    function __construct()
    {
        parent::__construct();
    }

    public function findAll() {
        $statement = $this->connection->query("SELECT * FROM users");
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}