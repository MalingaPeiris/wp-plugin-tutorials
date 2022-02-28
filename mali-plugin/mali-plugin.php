<?php

/**
@package MaliPlugin
 */

/**
 Plugin Name: Mali Plugin 
 Description: The first ever WP plugin by Mr. Malinga
 Version: 1.0
 Author: Mr. Malinga
 License: GPLv2 or later
 Text Domain: mali-plugin
 */

defined('ABSPATH') or die('No Access!');

class MaliPlugin
{
    function __construct()
    {
        add_action('init', array($this, 'custom_post_type'));
    }
    function activate()
    {
        //generate a CPT
        $this->custom_post_type();
        //flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate()
    {
        //flush rewrite rules
        flush_rewrite_rules();
    }

    function unistall()
    {
        //delete CPT
    }

    function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }
}
if (class_exists('MaliPlugin')) {
    $maliPlugin = new MaliPlugin();
}
//activation
register_activation_hook(__FILE__, array($maliPlugin, 'activate'));

//deactivate
register_deactivation_hook(__FILE__, array($maliPlugin, 'deactivate'));
