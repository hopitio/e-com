<?php

defined('BASEPATH') or die('no direct script access allowed');

class ProductImageMapper extends MapperAbstract
{

    function __construct()
    {
        $query = Query::make()
                ->select('pi.*, f.url, f.internal_path', true)
                ->from('t_product_image pi')
                ->innerJoin('t_file f', 'pi.fk_file = f.id')
                ->orderBy('pi.sort');
        $map = array(
            'fkProduct'     => 'fk_product',
            'fkFile'        => 'fk_file',
            'baseImage'     => 'base_image',
            'smallImage'    => 'small_image',
            'facebookImage' => 'facebook_image',
            'internalPath'  => 'internal_path'
        );
        parent::__construct('ProductImageDomain', $query, $map);
    }

    function filterProduct($productID)
    {
        $this->_query->where('fk_product=' . intval($productID));
        return $this;
    }

    function filterFile($fileID)
    {
        $this->_query->where('fk_file=' . intval($fileID));
        return $this;
    }

}
