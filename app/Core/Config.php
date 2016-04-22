<?php
namespace App\Core;

class Config
{

    public static $sBaseUrl = $_SERVER['DOCUMENT_ROOT'] . '/MaartenMVC/';
    public static $aDatabase = array(
        'host'     => 'localhost',
        'database' => 'example',
        'username' => 'user',
        'password' => 'secret'
    );

}