<?php

defined('BASEPATH') or die('no direct access allowed');

class ProductImageDomain implements DomainInterface
{

    public $fkProduct;
    public $fkFile;
    public $sort;

    /** Anh đại diện */
    public $thumbnail;
    /* Ảnh hiển thị sản phẩm */
    public $baseImage;
    public $smallImage;

    public $facebookImage;

    public $url;
    public $internalPath;
    /** Width của ảnh gỗc */
    public $width;

}
