<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Note;
use App\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request,$data = array())
    {
        $test = new Note();
        $test->name = 'Example';
        $test->email = 'test@example.com';
        $test->website = 'Website Test';
        $test->message = 'Hello World';
        $test->save();

        return new View('home.index', $data);
    }
}