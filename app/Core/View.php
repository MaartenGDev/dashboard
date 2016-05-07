<?php

namespace App\Core;

use App\Services\Container;
use Twig_Environment;
use Twig_Loader_Filesystem;
use App\Http\Request;

class View {

    public function __construct($sViewName, $data = array())
    {

        $aViewName = explode('.', $sViewName);
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../resources/views');
        $twig = new Twig_Environment($loader, array(
            'cache' => __DIR__ . '/../../storage/app/views',
            'debug' => true,
        ));

        $twig->addExtension(new \Twig_Extension_Debug());

        $path = count($aViewName) == 2 ? $aViewName[0] . '\\' . $aViewName[1] : $aViewName[0];
        $templateVariables = array('base' => Config::$sBaseUrl, 'title' => Config::$websiteName);

        foreach ($data as $variableKey => $variableValue)
        {
            $templateVariables[$variableKey] = $data[$variableKey];
        }
        $request = Container::get(Request::class);
        $flash = $request->flash();
        $templateVariables['errors'] = array_key_exists('errors',$flash) ? $flash['errors'] : array();
        $templateVariables['messages'] = array_key_exists('messages',$flash) ? $flash['messages'] : array();
        unset($flash);
        echo $twig->render($path . '.twig', $templateVariables);
    }
}