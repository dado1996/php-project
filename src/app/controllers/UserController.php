<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController {
    public function index() {
        $usersModel = new User();
        $users = $usersModel->findAll();

        include_once('src/app/views/users.php');
    }
}