<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductMapper extends MapperAbstract
{

    protected $_autoloadAttributes = false;
    protected $_attributeLanguage = null;
    protected $_autoloadTaxes = false;

    function __construct($domain = 'ProductDomain')
    {
        $query = Query::make()->select('p.*', true)->from('t_product p');

        $map = array(
            'fkCategory'   => 'fk_category',
            'fkRetailer'   => 'fk_retailer',
            'fkGroup'      => 'fk_group',
            'isGroup'      => 'is_group',
            'dateCreated'  => 'date_created',
            'countPin'     => 'count_pin',
            'priceOrigin'  => 'price_origin',
            'releaseDate'  => 'release_date',
            'salesPercent' => 'sales_percent'
        );

        parent::__construct($domain, $query, $map);
    }

    function filterID($id)
    {
        $this->_query->where('p.id=?', __METHOD__);
        $this->_queryParams[__METHOD__] = $id;
        return $this;
    }

    function filterName($language, $string)
    {
        if ($string)
        {
            $subQuery = "SELECT id FROM t_product_attribute_type WHERE codename='name'";
            $this->_query->innerJoin('t_product_attribute attr_name', "attr_name.fk_product = p.id AND attr_name.fk_attribute_type=($subQuery) AND attr_name.value_varchar LIKE '%$string%'AND attr_name.language='$language'");
        }
        return $this;
    }

    function filterStorageCode($code)
    {
        $subQuery = "SELECT id FROM t_product_attribute_type WHERE codename='storage_code'";
        $this->_query->innerJoin('t_product_attribute attr_storage_code', "attr_storage_code.fk_product = p.id AND attr_storage_code.fk_attribute_type=($subQuery) AND attr_storage_code.value_varchar LIKE '%$code%'");

        return $this;
    }

    /**
     * 
     * @param double $from null để không lọc
     * @param double $to null để không lọc
     * @param string $inCurrency tiền tệ của from & to
     */
    function filterPriceRange($from, $to, $inCurrency)
    {
        if ($from !== null)
        {
            $from = new Money($from, new Currency($inCurrency));
            $cond .= " AND p.price >= " . $from->convert(new Currency('VND'))->getAmount();
        }
        if ($to !== null)
        {
            $to = new Money($to, new Currency($inCurrency));
            $cond.= " AND p.price <= " . $to->convert(new Currency('VND'))->getAmount();
        }
        return $this;
    }

    function filterStockQty($from, $to)
    {
        $subQuery = "SELECT id FROM t_product_attribute_type WHERE codename='quantity'";
        $cond = "attr_qty.fk_product = p.id AND attr_qty.fk_attribute_type=($subQuery)";
        if ($from !== null)
        {
            $cond .= " AND attr_qty.value_number >= " . doubleval($from);
        }
        if ($to !== null)
        {
            $cond .= " AND attr_qty.value_number <= " . doubleval($to);
        }
        $this->_query->innerJoin('t_product_attribute attr_qty', $cond);
        return $this;
    }

    function filterRelatedProduct($productID)
    {
        $categoryID = "SELECT fk_category FROM t_product WHERE id=" . intval($productID);
        $this->_query->where("fk_category=($categoryID)");
        return $this;
    }

    function selectCountPin()
    {
        $this->_query->select('t_count_pin.count_pin AS count_pin')
                ->leftJoin('(SELECT fk_product, COUNT(*) AS count_pin FROM t_pin GROUP BY fk_product) AS t_count_pin', 'p.id=t_count_pin.fk_product');
        return $this;
    }

    function filterContainerCategory($category)
    {
        $this->_query->innerJoin('t_category c', 'p.fk_category=c.id AND c.fk_parent=' . intval($category));
        return $this;
    }

    function filterCategory($category)
    {
        if (!is_numeric($category))
        {
            $category = $this->_getCategoryByCode($category);
        }
        $this->_query->where('p.fk_category=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $category;
        return $this;
    }

    function filterSeller($sellerID)
    {
        $this->_query->where('p.fk_seller=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $sellerID;
        return $this;
    }

    function setLanguage($lang)
    {
        $this->_attributeLanguage = $lang;
        return $this;
    }

    /**
     * 
     * @param type $int 1=đang bán, 0=không bán, -1=đã xóa
     */
    function filterStatus($int)
    {
        if ($int !== false && $int !== null)
        {
            $this->_query->where('p.`status`=' . intval($int), __FUNCTION__);
        }
        else
        {
            $this->_query->where(null, __FUNCTION__);
        }
        return $this;
    }

    /**
     * 
     * @param type $bool
     * @return static
     */
    function autoloadAttributes($bool = true)
    {
        $this->_autoloadAttributes = $bool;
        return $this;
    }

    function autoloadTaxes($bool = true)
    {
        $this->_autoloadTaxes = $bool;
        return $this;
    }

    function orderByPrice($desc = false)
    {
        $this->_query->orderBy('p.price ' . ($desc ? 'DESC' : ''));
        return $this;
    }

    function filterDateRange($greater_than_date, $lesser_than_date)
    {
        if ($greater_than_date)
        {
            $this->_query->where('date_created >=?', __FUNCTION__ . 'greater');
            $this->_queryParams[__FUNCTION__ . 'from'] = $greater_than_date;
        }
        if ($lesser_than_date)
        {
            $this->_query->where('date_created <=?', __FUNCTION__ . 'lesser');
            $this->_queryParams[__FUNCTION__ . 'to'] = $lesser_than_date;
        }
        return $this;
    }

    /**
     * 
     * @param type $id
     * @param type $fields
     * @return ProductDomain
     */
    function find($callback = null)
    {
        return parent::find($callback);
    }

    function makeDomainCallback(&$domainInstance)
    {
        parent::makeDomainCallback($domainInstance);
        if ($this->_autoloadAttributes && $domainInstance->id)
        {
            $this->loadAttributes($domainInstance, $this->_attributeLanguage);
            $this->loadImages($domainInstance);
        }
        if ($this->_autoloadTaxes && $domainInstance->id)
        {
            $this->loadTaxes($domainInstance);
        }
    }

    /**
     * 
     * @param type $fields
     * @return ProductDomain
     */
    function findAll($callback = null)
    {
        return parent::findAll($callback);
    }

    protected function _getCategoryByCode($codename)
    {
        return DB::getInstance()->GetOne("SELECT id FROM t_category WHERE codename=?", array($codename));
    }

    function loadAttributes(ProductDomain $product, $language = null)
    {
        foreach ($this->_loadNoRepeatAttributes($product->id, $language) as $attr)
        {
            $product->addAttribute($attr);
        }
        foreach ($this->_loadRepeatAttributes($product->id, $language) as $attr)
        {
            $product->addAttribute($attr);
        }
    }

    /**
     * 
     * @param ProductDomain $domain
     */
    function loadTaxes(&$domain)
    {
        $taxes = TaxMapper::make()->setLanguage($this->_attributeLanguage)->filterProduct($domain->id)->findAll();
        foreach ($taxes as $tax)
        {
            $domain->addTax($tax);
        }
    }

    function loadImages(&$domain)
    {
        $images = ProductImageMapper::make()->filterProduct($domain->id)->findAll();
        $domain->setImages(is_array($images) ? $images : array());
    }

    /**
     * 
     * @param int $product_id
     * @return ProductAttributeDomain
     */
    protected function _loadNoRepeatAttributes($product_id, $language = null)
    {
        $attrMapper = ProductAttributeMapper::make()
                ->filterProduct($product_id)
                ->filterRepeatingGroup(false)
                ->setLanguage($language);
        return $attrMapper->findAll();
    }

    /**
     * 
     * @param int $product_id
     * @return ProductAttributeDomain
     */
    protected function _loadRepeatAttributes($product_id, $language = null)
    {
        $attrMapper = ProductAttributeMapper::make()
                ->filterProduct($product_id)
                ->filterRepeatingGroup(true)
                ->setLanguage($language);
        return $attrMapper->findAll();
    }

    function selectCountView()
    {
        $query = Query::make()->select("SUM(count_view)", true)->from('t_product_view')->where('fk_product=p.id');
        $this->_query->select("($query) AS count_view");
        return $this;
    }

    function filterTag($tag)
    {
        $tag = mysql_escape_string($tag);
        $tagID = "SELECT id FROM t_tag WHERE codename='$tag'";
        $productIDs = "SELECT DISTINCT fk_product FROM t_product_tag WHERE fk_tag=($tagID)";
        $this->_query->where("p.id IN($productIDs)", __FUNCTION__);
        return $this;
    }

}
