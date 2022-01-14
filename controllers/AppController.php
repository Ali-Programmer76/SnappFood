<?php
require_once('base/BaseController.php');

class AppController extends BaseController
{
    public function __construct()
    {
        return $this->check();
    }

    public function dashboard()
    {
        require_once('views/dashboard.php');
    }
}
