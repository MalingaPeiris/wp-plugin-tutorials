<?php

/**
@package MaliPlugin 
@return array full list of classes
 */

namespace Inc;

final class Init
{
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class
        ];
    }
    /**
     * loop through the classes, initialize them, and 
     * call the register() method if it exists
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
    /**
     * initailize the class
     */

    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}

/** 
use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Pages\Admin;

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
 **/
