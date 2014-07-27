<?php

class MY_Input extends CI_Input
{

    function _fetch_from_array(&$array, $index = '', $xss_clean = FALSE)
    {
        $return = $array;
        if (is_array($index))
        {
            foreach ($index as $key)
            {
                $return = parent::_fetch_from_array($return, $key, $xss_clean);
            }
        }
        else
        {
            $return = parent::_fetch_from_array($array, $index, $xss_clean);
        }
        return $return;
    }

}
