<?php

namespace App\Controllers;

use App\Core\View;

class DashboardController extends Controller {

    public function index() {
        return new View('dashboard.home');
    }

    public function showProfile($name) {
        return new View('dashboard.profile',array('name' => $name,'test' => 'oi2'));
    }
}