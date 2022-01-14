<?php
error_reporting(0);
require_once('base/jdf.php');
include_once('base/helpers.php');
$files = array_diff(scandir('models'), array('.', '..'));
foreach ($files as $key => $file) {
    require_once("models/$file");
}
session_start();
