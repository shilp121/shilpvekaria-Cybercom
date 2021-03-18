<?php
namespace Controller\Core;

\Mage::loadFileByClassName('Model\Core\Request');


class Front
{
    public static function init()
    {
    	$Request = \Mage::getModel('Model\Core\Request');
        $actionName = $Request->getActionName().'Action';
        $controllerName = ucfirst($Request->getControllerName());
        $controllerClassName = \Mage::prepareClassName('Controller\Admin',$controllerName);
        $controller = \Mage::getController($controllerClassName);
        $controller->$actionName();

    }
}
?>