<?php
namespace App\Http;

use App\Core\Config;
use App\Services\Container;
use \Exception;

class Route {

    private static $methodParameters = array();

    public static function get($sRouterURI, $sAction)
    {
        self::handleRequest($sRouterURI, $sAction, 'GET');
    }

    public static function post($sRouterURI, $sAction)
    {
        self::handleRequest($sRouterURI, $sAction, 'POST');
    }

    public static function handleRequest($sRouterURI, $sAction, $sRequestMethod)
    {
        if (Router::$bFoundRouter)
        {
            return false;
        }

        $aArguments = array();
        $sRequestURI = substr($_SERVER['REQUEST_URI'], strlen(Config::$sBaseUrl));

        if ($sRequestURI == '')
        {
            $sRequestURI = '/';
        }

        $aRouterArgs = explode('/', $sRouterURI);


        $sRouterURI = substr($sRouterURI, 0, 1) == '/' ? substr($sRouterURI, 1) : $sRouterURI;

        $aRequestArgs = explode('/', $sRequestURI);

        preg_match_all('({[A-Za-z]{1,}})', $sRouterURI, $aMatches);
        if (count($aMatches) > 0 && (count($aRouterArgs) == count($aRequestArgs)))
        {
            foreach ($aMatches[0] as $sMatch)
            {
                $iCurrentIndex = array_search($sMatch, $aRouterArgs);
                $aArguments[str_replace(array('{', '}'), '', $aRouterArgs[$iCurrentIndex])] = $aRequestArgs[$iCurrentIndex];
                unset($aRouterArgs[$iCurrentIndex]);
                unset($aRequestArgs[$iCurrentIndex]);
            }

            $sRouterURI = implode('', $aRouterArgs);
            $sRequestURI = implode('', $aRequestArgs);
        }


        if (($sRouterURI == $sRequestURI) && $sRequestMethod == $_SERVER['REQUEST_METHOD'])
        {
            try
            {

                list($sController, $sAction) = explode('@', $sAction);
                $sControllerPath = 'App\Controllers\\' . $sController;

                $reflector = new \ReflectionClass('App\Controllers\\' . $sController);

                foreach($aArguments as $modelName => $parameter){
                    $currentModel = 'App\Models\\'. $modelName;

                    if(class_exists($currentModel)){
                        Container::set($currentModel, $currentModel::find($parameter));
                    }
                }

                $reflector->getNamespaceName();
                foreach ($reflector->getMethod($sAction)->getParameters() as $parameter)
                {
                    // Check  if the argument is a class not a variable like: $name or $id
                    if(!is_null($parameter->getClass()) && class_exists($parameter->getClass()->name)){
                        array_push(self::$methodParameters, Container::get($parameter->getClass()->name));
                    }else{
                        array_push(self::$methodParameters,$aArguments[$parameter->name]);
                    }
                }
                // Create the object.
                $oCurrentObject = new $sControllerPath();
                Router::$bFoundRouter = true;

                return call_user_func_array(array($oCurrentObject, $sAction), self::$methodParameters);

            } catch (Exception $e)
            {
                var_dump($e->getMessage());
            }
        } else
        {
            return false;
        }

        return false;
    }

}
