<?php


require_once 'config/init.php';
//lädt die initialen Werte
require_once 'config/database.php';
//lädt werte für datenbank

// load core stuff
require_once COREPATH.'functions.php';
require_once COREPATH.'controller.class.php';
require_once COREPATH.'model.class.php';


session_start();

$controllerName = 'pages'; // default controller if noting is set
$actionName = 'index'; // default action if nothing is set

// check a controller is given
if(isset($_GET['c']))
{
    $controllerName = $_GET['c'];
}

// check an action is given
if(isset($_GET['a']))
{
    $actionName = $_GET['a'];
}