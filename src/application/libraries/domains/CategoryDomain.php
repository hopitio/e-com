<?php

defined('BASEPATH') or die('No direct script access allowed');

class CategoryDomain implements DomainInterface
{

    public $id;
    public $codename;
    public $fkParent;
    public $sort;
    public $path;
    public $image;
    public $status;
    //load lang từ bảng t_category_language
    public $name;
    public $description;
    public $language;

    /** true nếu chứa category khác, false nếu chứa product */
    public $isContainer;

    function getURL()
    {
        return '/category/show/' . $this->id;
    }

}
