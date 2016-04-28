<?php

namespace App\Core;
use App\Http\Request;
use Twig_Environment;
use Twig_Loader_Filesystem;

class View
{
    public function __construct($sViewName,$data = array(),$errors = array())
    {
        $aViewName = explode('.', $sViewName);


        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../resources/views');
        $twig = new Twig_Environment($loader, array(
            'cache' => __DIR__ . '/../../storage/app/views',
        ));
        echo $twig->render($aViewName[0] . '\\' .$aViewName[1] .'.twig',array('status' => 'Awesome'));
    }
}