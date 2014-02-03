<?php

defined('DS') or die;

class Bootstrap
{

    function __construct($url)
    {
        Front_controller::get_instance($url)->run();
    }

}
