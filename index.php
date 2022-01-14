<?php
require_once('base/autoload.php');

include_once('controllers/DisplayPagesController.php');
$method = $page = $_GET['p'] ?? 'landing';

if (class_exists("DisplayPagesController")) {
    $controller = new DisplayPagesController;
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        abort(404);
    }
} else {
    abort(404);
}
