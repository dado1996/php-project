<?php

namespace Router;

use App\Controllers\UserController;

class MainRouter {
    private string $path;
    private string $method;

    function __construct(string $path, string $method) {
        $this->path = $path;
        $this->method = $method;
    }

    public function callRoute() {
        $controller = null;
        switch ($this->path) {
            case '/users':
                $controller = new UserController();
                break;

            default:
                $controller = null;
        }

        if (!$controller) {
            echo "<h1>Invalid route</h1>";
            return;
        }

        $controller->index();
    }
}