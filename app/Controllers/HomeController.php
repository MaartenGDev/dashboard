<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Note;
use App\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        return new View('welcome');
    }
}