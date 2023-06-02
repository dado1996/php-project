<?php

namespace Router;

class MainRouter {
    private string $path;
    private string $method;
    private $body;
    private $query;

    function __construct(string $path, string $method, $query = [], $body = []) {
        $this->path = $path;
        $this->method = $method;

        $this->query = count($query) ? $query : null;
        $this->body = count($body) ? $body : null;
    }

    public function callRoute() {
        $controller = null;

        @[, $path, $subpath] = explode("/", $this->path, 3);
        unset($tmp);

        switch ($path) {
            case 'users':
                $controller = new UserRouter();
                break;

            case '':
                $controller = new HomeRouter();
                break;

            default:
                $controller = null;
        }

        if (!$controller) {
            echo "<p>Invalid route</p>";
            return;
        }

        switch ($subpath) {
            case 'create':
                if ($this->method === "POST") {
                    $controller->create($this->body);
                    break;
                }

                $controller->createView();
                break;
                
            default:
                $controller->index();
        }
    }
}