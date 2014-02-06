<?php

defined('DS') or die;

class Lang
{

    /** Viết hoa chữ cái đầu câu */
    const DECO_UPPER_FIRST = 1;

    /** Viết hoa tất cả */
    const DECO_UPPER_ALL = 2;

    /** Viêt hoa chữ cái đầu TỪ */
    const DECO_UPPER_TITLE = 3;

    static protected $_instances = array();
    protected $_dictionary = array();
    protected $_lang_name;
    protected $_source_file;
    protected $_cached_file;

    /**
     * @param string $lang_name
     * @return \Lang
     */
    static function get_instance($lang_name)
    {
        if (!isset(static::$_instances[$lang_name]))
        {
            static::$_instances[$lang_name] = new static($lang_name);
        }
        return static::$_instances[$lang_name];
    }

    function __construct($lang_name)
    {
        $this->_lang_name = $lang_name;
        $this->_source_file = App::get_langs_dir() . "$lang_name.xml";
        $this->_cached_file = App::get_cache_dir() . DS . 'langs' . DS . "$lang_name.cache";
        $this->_load();
    }

    protected function _load()
    {
        if (!file_exists($this->_source_file))
        {
            throw new InvalidArgumentException("{$this->_source_file} Không tồn tại");
        }
        if (!$this->_get_cache())
        {
            $this->_create_cache();
        }
        return $this;
    }

    protected function _get_cache()
    {
        //tồn tại
        if (!file_exists($this->_cached_file))
        {
            return false;
        }
        //mới nhất
        if (filemtime($this->_cached_file) < filemtime($this->_source_file))
        {
            return false;
        }
        $this->_dictionary = unserialize(file_get_contents($this->_cached_file));
        return $this->_dictionary ? true : false;
    }

    protected function _create_cache()
    {
        $dom = simplexml_load_file($this->_source_file, 'SimpleXMLElement', LIBXML_NOCDATA);
        $this->_dictionary = array();
        foreach (xpath($dom, '//item') as $dom_item)
        {
            $key = strval($dom_item->attributes()->id);
            $val = strval($dom_item);
            if (isset($this->_dictionary[$key]))
            {
                throw new Exception("Trùng Lang ID: $key");
            }
            $this->_dictionary[$key] = $val;
        }
        ksort($this->_dictionary);
        if (!is_dir(dirname($this->_cached_file)) && !mkdir(dirname($this->_cached_file), '0777', true))
        {
            throw new Exception('Không tạo được thư mục: ' . dirname($this->_cached_file));
        }
        file_put_contents($this->_cached_file, serialize($this->_dictionary));
    }

    /**
     * 
     * @param string $id
     * @param array $params
     * @return string
     */
    function translate($id, $params = array())
    {
        if (!isset($this->_dictionary[$id]))
        {
            return "{{$id}}";
        }
        if (empty($params))
        {
            return $this->_dictionary[$id];
        }
        return call_user_func_array('sprintf', array_merge(array($this->_dictionary[$id]), $params));
    }

}
