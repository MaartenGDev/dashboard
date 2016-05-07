<?php

namespace App\Http;

use App\Core\View;
class Router
{
    public static $bFoundRouter = false;

    public function __construct()
    {
        Route::get('/', 'HomeController@index');
        Route::get('notes', 'NoteController@listNotes');
        Route::get('notes/add', 'NoteController@showForm');
        Route::get('note/{note}', 'NoteController@getNote');
        Route::post('notes/add', 'NoteController@addNote');

        if(!self::$bFoundRouter){
           new View('errors.index',array('errorName' => 'Error 404 Not Found'));
        }
    }
}
