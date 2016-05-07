<?php

namespace App\Models;


use App\Core\Config;
use App\Http\Request;

class Redirect {
    protected $errors;

    public function __construct($location) {
        header('Location: ' . Config::$sBaseUrl . $location);

    }
}