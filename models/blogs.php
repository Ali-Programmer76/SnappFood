<?php

require_once('base/BaseModels.php');

class Blogs extends BaseModels
{
    public function tagsForTextArea()
    {
        return str_replace(", ", "\r\n", $this->tags);
    }
}
