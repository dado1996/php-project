<?php

namespace App\Models;

class User extends BaseModel
{

    function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $statement = $this->connection->query("SELECT * FROM users");
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findFirst(int $id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = ['id' => $id];

        $statement = $this->connection->prepare($sql, [\PDO::ATTR_CURSOR, \PDO::CURSOR_FWDONLY]);
        $statement->execute($params);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function create(string $personal_id, string $name, string $email, string $password)
    {
        $sql = "INSERT INTO users (personal_id, name, email, password) VALUES (:personal_id, :name, :email, :password) ";
        $statement = $this->connection->prepare($sql, [\PDO::ATTR_CURSOR, \PDO::CURSOR_FWDONLY]);
        $statement->execute([
            'personal_id' => $personal_id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update(int $id, string $personal_id = "", string $name = "", string $email = "", string $password = "") {
        $sql = "UPDATE users SET ";
        $params = [];
        if ($personal_id) {
            $sql .= "(personal_id=:personal_id),";
            $params['personal_id'] = $personal_id;
        }
        if ($name) {
            $sql .= "(name=:name),";
            $params['name'] = $name;
        }
        if ($email) {
            $sql .= "(email=:email),";
            $params['email'] = $email;
        }
        if ($password) {
            $sql .= "(password=:password),";
            $params['password'] = $password;
        }

        $sql = rtrim($sql, ',');
        $sql .= " WHERE id = :id";

        $statement = $this->connection->prepare($sql, [\PDO::ATTR_CURSOR, \PDO::CURSOR_FWDONLY]);
        $statement->execute($params);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);   
    }
}
