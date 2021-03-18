<?php

class Mage
{
    public static function init()
    {
        self::loadFileByClassName("controller\core\Front");
        \Controller\Core\Front::init();

    }

    public static function getModel($className)
    {
        self::loadFileByClassName($className);
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return new $className();
    }

    public static function prepareClassName($key,$nameSpace){

        $className = $key."_".$nameSpace;
        $className = str_replace('_', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return $className;

    }

    public static function getBlock($className)
    {
        self::loadFileByClassName($className);
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return new $className();
    }

    public static function getController($className)
    {
        //print_r($className);die();
        self::loadFileByClassName($className);
        //print_r($className);die();
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return new $className();
    }


    public static function loadFileByClassName($className)
    {
        
        //print_r($className);
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        $className = $className . '.php';
       
        require_once $className;
    } 
}
Mage::init();
?>