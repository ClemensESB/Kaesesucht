<?php


require_once 'config/init.php';
//lädt die initialen Werte
require_once 'config/database.php';
//lädt werte für datenbank

// load core stuff
require_once COREPATH.'functions.php';
require_once COREPATH.'controller.class.php';
require_once COREPATH.'model.class.php';

//lädt alle models
foreach(glob(MODELSPATH."*.php") as $file)
{
	require($file);
}


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


// check controller/class and method exists
if(file_exists(CONTROLLERSPATH.$controllerName.'Controller.php')) // √
{
    // include the controller file
    require_once CONTROLLERSPATH.$controllerName.'Controller.php'; // √

    // generate the class name of the controller using the name extended by Controller
    // also add the namespace in front
    $className = '\\kae\\controller\\'.ucfirst($controllerName).'Controller'; // √

    // generate an instace of the controller using the name, stored in $className
    // it is the same like calling for example: new \dwp\controller\PagesController()
    $controller = new $className($controllerName, $actionName); // √

    // checking the method is available in the controller class
    // the method looks like: actionIndex()
    $actionMethod = 'action'.ucfirst($actionName); // √
    if(!method_exists($controller, $actionMethod)) // √
    {
        // redirect to error page 404 because not found
        header('Location: index.php?c=errors&a=error404');
        exit(0);
    }
    else
    {
        // call the action method to do the job
        // so the action cann fill the params for the view which will be used 
        // in the render process later
        $controller->{$actionMethod}(); // √
    }
}
else
{
    // redirect to error page 404 because not found
    header('Location: index.php?c=errors&a=error404&error=nocontroller');
    exit(0);
}
//<link rel="stylesheet" href="assets/styles/style.css">
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/stylesheets/styles.css">


    <script>
        $(document).ready(function() {
            var count = 3;
            $(".btn").click(function() {
                count += 3;
                $("#page_container").load("", {
                    newCount: count,
                });
            });
        });
    </script>

    <title>Käsesucht</title>
</head>
<body>
        <?include ASSETPATH.'navBar.html';?>
        <div class="wrapper">
        <?php
        // this method will render the view of the called action
        // for this the the file in the views directory will be included
        $controller->render();?>
        </div>
        <?include ASSETPATH.'footer.html';?>
</body>
</html>