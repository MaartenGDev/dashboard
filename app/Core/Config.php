<?php
namespace App\Core;

class Config
{

    public static $sBaseUrl = '/';
    public static $websiteName = 'Guest Book';
    public static $aDatabase = [
        'host'     => 'localhost',
        'database' => 'GuestBook',
        'username' => 'homestead',
        'password' => 'secret'
    ];
}