<?php

class FileInput extends InputAbstract
{

    function __construct($id, $name, $accept = null, $multiple = false)
    {
        parent::__construct('file', $id, $name);
        if ($accept)
        {
            $this->setAttribute('accept', $accept);
        }
        if ($multiple)
        {
            $this->setAttribute('multiple', true);
        }
    }
    
}
