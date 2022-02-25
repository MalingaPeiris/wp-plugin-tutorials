<?php

/**
@package MaliPlugin
 */

/**
 Plugin Name: Mali Plugin 
 Description: The first eveer WP plugin by Mr. Malinga
 Version: 1.0
 Author: Mr. Malinga
 License: GPLv2 or later
 Text Domain: mali-plugin
 */

defined('ABSPATH') or die('No Access!');

class MaliPlugin
{
    function activate()
    {
        //generate a CPT
        //flush rewrite rules
    }

    function deactivate()
    {
        //flush rewrite rules

    }

    function unistall()
    {
        //delete CPT
    }
}
if (class_exists('MaliPlugin')) {
    $maliPlugin = new MaliPlugin();
}
//activation
register_activation_hook(__FILE__, array($maliPlugin, 'activate'));

//deactivate
register_deactivation_hook(__FILE__, array($maliPlugin, 'deactivate'));