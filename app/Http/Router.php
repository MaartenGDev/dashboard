<?php

namespace App\Http;

use App\Core\View;
class Router
{
    public static $bFoundRouter = false;

    public function __construct()
    {
        Route::get('/', 'DashboardController@index');
        Route::get('profile/{name}', 'DashboardController@showProfile');

        if(!self::$bFoundRouter){
           new View('errors.index',array('errorName' => 'Error 404 Not Found'));
        }
    }
}
