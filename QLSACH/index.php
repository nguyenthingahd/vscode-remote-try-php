<?php
session_start();

if (isset($_GET['controller'])) {
    $controllerName = ucfirst($_GET['controller']) . 'Controller';
} else {
    $controllerName = 'SachController';
}

$controllerFile = 'controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();
  
    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    } else {
        $controller->index();
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo "File không tồn tại.";
}
?>
