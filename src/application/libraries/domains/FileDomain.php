<?php

class FileDomain implements DomainInterface
{

    public $id;
    public $fkUser;
    public $fkParent;
    public $displayName;
    public $realPath;
    public $isDir;
    public $dateModified;

    function isDir()
    {
        return ((bool) $this->isDir);
    }

    function getUrl()
    {
        return site_url('uploads/' . $this->realPath);
    }

}
