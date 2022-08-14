<?php
session_start();
  include "application/Connection.php";
  include "application/view.php";
  include "application/Unicode.php";
?>
<?php
  $controller = isset($_GET["controller"]) ? $_GET["controller"]:"Home";
  $action = isset($_GET["action"]) ?$_GET["action"]:"index";
  $controllerFile = "controllers/".ucfirst($controller)."Controller.php";
  if(file_exists($controllerFile))
  {
    include "$controllerFile";
    $controllerClass = ucfirst($controller)."Controller";
    $obj = new $controllerClass();
    // echo $controller;
    echo ($obj->$action());
  }
?>