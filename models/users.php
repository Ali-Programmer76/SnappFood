<?php

require_once('base/BaseModels.php');

class Users extends BaseModels
{
    public function fullName()
    {
        return $this->firstname . " " . $this->lastname;
    }
}
