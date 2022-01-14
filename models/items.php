<?php

require_once('base/BaseModels.php');

class Items extends BaseModels
{
    public function payable()
    {
        return $this->amount * $this->count;
    }
}
