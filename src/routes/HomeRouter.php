<?php

namespace Router;

class HomeRouter {
    public function index() {
        include_once('src/app/views/home.php');
    }
}