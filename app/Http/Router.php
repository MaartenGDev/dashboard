<?php

namespace App\Http;

use App\Core\View;


class Router extends Route
{
    public static $bFoundRouter = false;
    public function __construct(Request $request)
    {

        Route::GET('notes', 'NoteController@listNotes', $request);
        Route::GET('notes/add', 'NoteController@showForm',$request);
        Route::POST('notes/add', 'NoteController@addNote',$request);

        if(!self::$bFoundRouter){
           new View('errors.index',array('errorName' => 'Error 404 Not Found'));
        }
    }
}
