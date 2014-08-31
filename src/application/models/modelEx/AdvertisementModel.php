<?php

defined('BASEPATH') or die('No direct script access allowed');

class AdvertisementModel extends BaseModel
{

    protected $banner_location = "images/banner/";

    function loadBanner($banner_type_list = '')
    {
        $query = Query::make()
                ->select('`key`,`value`', 1)
                ->from('t_setting');
        if ($banner_type_list != '')
        {
            $query = $query->where('`key` in (' . $banner_type_list . ')');
        }
        $result = DB::getInstance()->GetAssoc($query);
        $banner = array();
        foreach ($result as $key => $value)
        {
            $banner[$key] = array();
            $xml = new SimpleXMLElement($result[$key]);
            $img = $xml->xpath('img');
            for ($i = 0; $i < count($img); $i++)
            {
                $img_arr = (array) ($img[$i]);
                $banner[$key][$i] = $img_arr["@attributes"];
            }
        }
        return $banner;
    }

    function update()
    {
        $files = $_FILES;
        $post = $this->input->post();
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        $xml = array();

        //old banner
        foreach ($post['old_banner'] as $banner_type => $json_old_banner_files)
        {
            if (!isset($xml[$banner_type]))
            {
                $xml[$banner_type] = '';
            }
            $old_banner_files = json_decode($json_old_banner_files);
            if (!is_array($old_banner_files))
            {
                continue;
            }
            foreach ($old_banner_files as $old_banner_file)
            {
                $old_banner_file = (array) $old_banner_file;
                $banner_src = $old_banner_file['src'];
                $banner_title = $old_banner_file['title'];
                $banner_href = $old_banner_file['href'];
                $xml[$banner_type] .= '<img src="' . $banner_src . '" title="' . $banner_title . '" href="' . $banner_href . '"/>';
            };
        }//old banner
        //new banner
        foreach ($files as $banner_type => $banner_files)
        {
            if (!isset($xml[$banner_type]))
            {
                $xml[$banner_type] = '';
            }

            foreach ($banner_files['name'] as $banner_no => $banner_name)
            {
                $banner_file_type = $banner_files['type'][$banner_no];
                $temp = explode(".", $banner_name);
                $banner_file_extension = end($temp);
                $banner_file_error = $banner_files['error'][$banner_no];
                $banner_file_tmp_name = $banner_files['tmp_name'][$banner_no];
                $banner_file_size = $banner_files['size'][$banner_no];
                if ((($banner_file_type == "image/gif") || ($banner_file_type == "image/jpeg") || ($banner_file_type == "image/jpg") || ($banner_file_type == "image/pjpeg") || ($banner_file_type == "image/x-png") || ($banner_file_type == "image/png")) && in_array($banner_file_extension, $allowedExts))
                {
                    if (!$banner_file_error > 0)
                    {
                        $banner_src = $this->banner_location . $banner_name;
                        move_uploaded_file($banner_file_tmp_name, $banner_src);
                        $banner_title = $post["new_banner"][$banner_type][$banner_no]['title'];
                        $banner_href = $post["new_banner"][$banner_type][$banner_no]['href'];
                        $xml[$banner_type] .= '<img src="' . $banner_src . '" title="' . $banner_title . '" href="' . $banner_href . '"/>';
                    }
                }
            }
        }//new banner

        foreach ($xml as $key => $value)
        {
            $xml[$key] = '<root>' . $value . '</root>';
        }

        foreach ($xml as $banner_type => $xml_banner_type)
        {
            $setting = Setting::getInstance();
            $setting->set($banner_type, $xml_banner_type);
            $setting->save();
        }
    }

}
