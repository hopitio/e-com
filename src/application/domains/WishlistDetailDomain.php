<?php

defined('BASEPATH') or die('No direct script access allowed');

class WishlistDetailDomain implements DomainInterface
{

    const TYPE_PRODUCT = 'product';
    const TYPE_NOTE = 'note';
    const TYPE_LINK = 'link';

    public $id;
    public $fkWishlist;
    public $type;
    public $note;
    public $fkProduct;

}
