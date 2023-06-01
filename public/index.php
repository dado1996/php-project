<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Router\MainRouter;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

print("<pre>" . print_r($_SERVER, 1) . "</pre>");

$router = new MainRouter($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
$router->callRoute();