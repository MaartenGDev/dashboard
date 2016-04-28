<?php

namespace App\Http;

use App\Core\View;
class Router
{
    public static $bFoundRouter = false;

    public function __construct()
    {
        $route = new Route();
        $route->handleRequest('notes', 'NoteController@listNotes','GET');
        $route->handleRequest('notes/add', 'NoteController@showForm','GET');
        $route->handleRequest('notes/add', 'NoteController@addNote','POST');

        if(!self::$bFoundRouter){
           new View('errors.index',array('errorName' => 'Error 404 Not Found'));
        }
    }
}
