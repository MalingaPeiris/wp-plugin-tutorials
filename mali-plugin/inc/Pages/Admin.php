<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;

    function __construct()
    {
        $this->settings = new SettingsApi();
    }

    public function register()
    {
        //add_action('admin_menu', array($this, 'add_admin_pages'));

        $pages = [[
            'page_title' => 'Mali Plugin',
            'menu_title' => 'Mali',
            'capability' => 'manage_options',
            'menu_slug' => 'mali_plugin',
            'callback' =>
            function () {
                echo '<h1>Mali Plugins</h1>';
            },
            'icon_url' => 'dashicons-store',
            'position' => 110
        ]];

        $this->settings->addPages($pages)->register();
    }

    /**  public function add_admin_pages()
    {
        add_menu_page('Mali Plugin', 'Mali', 'manage_options', 'mali_plugin', array($this, 'admin_index'), 'dashicons-store', 100);
    }
    public function admin_index()
    {
        require_once plugin_dir_path(__FILE__) . '../../templates/admin.php';
    }*/
}
