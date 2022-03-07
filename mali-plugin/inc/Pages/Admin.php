<?php

namespace Inc\Pages;

class Admin
{
    function __construct()
    {
    }

    public function register()
    {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    public function add_admin_pages()
    {
        add_menu_page('Mali Plugin', 'Mali', 'manage_options', 'mali_plugin', array($this, 'admin_index'), 'dashicons-store', 100);
    }
    public function admin_index()
    {
        require_once plugin_dir_path(__FILE__) . '../../templates/admin.php';
    }
}
