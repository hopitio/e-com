<?php

class FeatureGroupDetailsMapper extends ProductFixedMapper
{

    function __construct($domain = 'FeatureGroupDetailsDomain')
    {
        parent::__construct($domain);
        $this->filterStatus(false);
        $this->_query
                ->select('fpd.sort, fpd.img_src, fpd.img_url, fpd.img_title, fpd.row', false)
                ->from('t_feature_group_details fpd')
                ->leftJoin('t_product p', 'fpd.fk_product=p.id AND p.status = 1')
                ->orderBy('fpd.sort');
        $this->_map += array(
            'imgSrc'   => 'img_src',
            'imgTitle' => 'img_title',
            'imgUrl'   => 'img_url'
        );
    }

    function filterGroup($id)
    {
        $this->_query->where('fpd.fk_group=' . intval($id));
        return $this;
    }

}
