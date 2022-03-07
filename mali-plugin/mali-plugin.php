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

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once(dirname(__FILE__) . '/vendor/autoload.php');
}

define ('PLUGIN_PATH', plugin_dir_path(__FILE__));
define ('PLUGIN_URL', plugin_dir_url(__FILE__));

if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}