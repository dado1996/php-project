<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    private User $userModel;

    function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        return $this->userModel->findAll();
    }

    public function getFirst(int $id = 0, string $personal_id = '') {
        return $this->userModel->findFirst($id);
    }

    public function create($body)
    {
        [
            'personal_id' => $personal_id,
            'name' => $name,
            'email' => $email,
            'password' => $password
        ] = $body;

        $new_password = password_hash($password, PASSWORD_BCRYPT);
        return $this->userModel->create($personal_id, $name, $email, $new_password);
    }
}
