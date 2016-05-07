<?php
namespace App\Services;
class Container
{
    protected static $services = array();

    public static function set($serviceName,$instance){
        $serviceKey = strtolower(str_replace('\\','',$serviceName));
        if(!array_key_exists($serviceKey,self::$services)){
            self::$services[$serviceKey] = $instance;
        }

        return true;
    }
    public static function get($serviceName)
    {

        $serviceKey = strtolower(str_replace('\\','',$serviceName));
        if(!array_key_exists($serviceKey,self::$services)){
            self::$services[$serviceKey] = new $serviceName;
        }
        return self::$services[$serviceKey];
    }
}