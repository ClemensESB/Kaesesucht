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


    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/global.css" type="text/css" media="all">

    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="assets/scripts/pagination.js"  type=" text/javascript"></script>-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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