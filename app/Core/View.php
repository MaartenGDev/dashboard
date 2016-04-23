<?php

namespace App\Core;


class View
{
    public function __construct($sViewName,$data = array())
    {
        $aViewName = explode('.', $sViewName);
        $sPath = $_SERVER['DOCUMENT_ROOT']  . Config::$sBaseUrl. 'resources/views/'  . (count($aViewName) == 2 ?  $aViewName[0] . '/' . $aViewName[1] : $aViewName[0]) . '.php';
        if(file_exists($sPath)){
            include_once($sPath); 
        } else{
            throw new \Exception('View not found');
        }    
    }
}