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
    public $pathSort;
    public $isShowInHome = 0;

    /** @var static */
    public $children = array();

    /** @var SimpleXMLElement */
    public $dom_side_images;

    /** @var SimpleXMLElement */
    public $dom_slide_image;

    /** @var SimpleXMLElement */
    public $dom_product_section_images;

    /** true nếu chứa category khác, false nếu chứa product */
    public $isContainer;

    function getURL()
    {
        return '/category/show/' . $this->id;
    }

    function getLevel()
    {
        return substr_count($this->path, '/');
    }

}
