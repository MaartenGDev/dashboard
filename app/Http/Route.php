<?php
namespace App\Http;

use App\Core\Config;
use App\Services\Container;
use \Exception;

class Route
{
    private $methodParameters = array();

    public function handleRequest($sRouterURI, $sAction, $sRequestMethod)
    {
        if (Router::$bFoundRouter) {
            return false;
        }

        $aArguments = array();
        $sRequestURI = substr($_SERVER['REQUEST_URI'], strlen(Config::$sBaseUrl));

        if($sRequestURI == ''){
          $sRequestURI = '/';
        }

        $aRouterArgs = explode('/', $sRouterURI);
        $aRequestArgs = explode('/', $sRequestURI);

        preg_match_all('({[A-Za-z]{1,}})', $sRouterURI, $aMatches);
        if (count($aMatches) > 0 && (count($aRouterArgs) == count($aRequestArgs))) {

            foreach ($aMatches[0] as $sMatch) {
                $iCurrentIndex = array_search($sMatch, $aRouterArgs);
                $aArguments[str_replace(array('{', '}'), '', $aRouterArgs[$iCurrentIndex])] = $aRequestArgs[$iCurrentIndex];
                unset($aRouterArgs[$iCurrentIndex]);
                unset($aRequestArgs[$iCurrentIndex]);
            }

            $sRouterURI = implode('', $aRouterArgs);
            $sRequestURI = implode('', $aRequestArgs);
        }


        if (($sRouterURI == $sRequestURI) && $sRequestMethod == $_SERVER['REQUEST_METHOD']) {
            try {

                list($sController, $sAction) = explode('@', $sAction);
                $sControllerPath = 'App\Controllers\\' . $sController;

                $reflector = new \ReflectionClass('App\Controllers\\' . $sController);
                
                $reflector->getNamespaceName();
                foreach($reflector->getMethod($sAction)->getParameters() as $parameter){
                    array_push($this->methodParameters,Container::get($parameter->getClass()->name));

                }

                $oCurrentObject = new $sControllerPath();
                Router::$bFoundRouter = true;

                if (count($aArguments) > 0) array_push($this->methodParameters,$aArguments);
                return call_user_func_array(array($oCurrentObject,$sAction),$this->methodParameters);

            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        } else {
            return false;
        }
        return false;
    }

}
