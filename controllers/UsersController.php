<?php
require_once('base/BaseController.php');

class UsersController extends BaseController
{
    public function __construct()
    {
        return $this->check("admin");
    }

    public function all()
    {
        $users = Users::all();
        require_once('views/app/users/all.php');
    }
}
