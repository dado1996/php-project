<?php

namespace Router;

use App\Controllers\UserController;

class UserRouter {
    private UserController $userController;
    function __construct()
    {
        $this->userController = new UserController();
    }

    public function index() {
        $users = $error = null;
        try {
            $users = $this->userController->index();
        } catch (\Error $e) {
            $error = $e->getMessage();
        } finally {
            include_once('src/app/views/users.php');
        }
    }

    public function createView() {
        include_once('src/app/views/user-form.php');
    }

    public function create($body) {
        $users = $error = null;

        try {
            if (!$body) {
                throw new \Error('No data');
            }
            $this->userController->create($body);
            header('Location: /users');
        } catch (\Exception $e) {
            $error = $e->getMessage();
            include_once('src/app/views/user-form.php');
        } catch (\Error $e) {
            $error = $e->getMessage();
            include_once('src/app/views/user-form.php');
        }
    }
}