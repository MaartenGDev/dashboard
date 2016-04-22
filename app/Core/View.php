<?php

namespace App\Core;


class View
{
    public function __construct($sViewName,$data = array())
    {
        $aViewName = explode('.', $sViewName);
        $sFilePath = count($aViewName) == 2 ? 'resources/Views/' .  $aViewName[0] . '/' . $aViewName[1] . '.php' : 'resources/Views/' . $aViewName[0] . '.php';   
        $sCurrentViewPath = Config::$sBaseUrl. $sFilePath;
        file_exists($sCurrentViewPath) ? include_once($sCurrentViewPath) : throw new \Exception('Incorrect View or incorrect baseUrl in config file.');
    }

}