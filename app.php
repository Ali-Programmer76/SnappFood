<?php
require_once('base/autoload.php');

$method = $_GET['m'] ?? 'dashboard';
$controller_name = $_GET['c'] ?? 'app';
$controller_name = ucfirst($controller_name) . "Controller";
include_once("controllers/$controller_name.php");

if (class_exists($controller_name)) {
    $controller = new $controller_name;
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        abort(404);
    }
} else {
    abort(404);
}
