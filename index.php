<?php

require('config.php');

$controller = empty($_GET['controller']) ? CONTROLLER_DEFAULT : $_GET['controller'];

$action = empty($_GET['action']) ? ACTION_DEFAULT : $_GET['action'];

$controller = ucfirst(strtolower($controller)) . 'Controller';

require_once('Controllers/' . $controller . '.php');
$controllerObject = new $controller();
$controllerObject->$action();