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

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

class MaliPlugin
{

    public $plugin;
    function __construct()
    {
        $this->plugin = plugin_basename(__FILE__);
        add_action('init', array($this, 'custom_post_type'));
    }
    function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));

        add_action('admin_menu', array($this, 'add_admin_pages'));

        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }
    public function settings_link($links)
    {
        $settings_link = '<a href="options-general.php?page=mali_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    public function add_admin_pages()
    {
        add_menu_page('Mali Plugin', 'Mali', 'manage_options', 'mali_plugin', array($this, 'admin_index'), 'dashicons-store', 100);
    }
    public function admin_index()
    {
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }
    function activate()
    {
        //generate a CPT
        //$this->custom_post_type();
        //flush rewrite rules
        Activate::activate();
    }

    function deactivate()
    {
        //flush rewrite rules
        //flush_rewrite_rules();
    }

    function unistall()
    {
        //delete CPT
    }

    function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }

    function enqueue()
    {
        //enqueue all scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }
}
if (class_exists('MaliPlugin')) {
    $maliPlugin = new MaliPlugin();
    $maliPlugin->register();
}
//activation
//require_once plugin_dir_path(__FILE__) . 'inc/mali-plugin-activate.php';
//register_activation_hook(__FILE__, array('MaliPluginActivate', 'activate'));

//deactivate
//require_once plugin_dir_path(__FILE__) . 'inc/mali-plugin-deactivate.php';
//register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));
