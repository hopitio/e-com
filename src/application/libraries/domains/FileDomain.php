<?php

class FileDomain implements DomainInterface
{

    public $id;
    public $fkUser;
    public $fkParent;
    public $url;
    public $isDir;
    public $dateModified;
    public $internalPath;

    function isDir()
    {
        return ((bool) $this->isDir);
    }

    function __toString()
    {
        return $this->url;
    }

}
