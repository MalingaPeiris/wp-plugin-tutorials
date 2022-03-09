<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;

    public $pages = array();

    public $subpages = array();

    function __construct()
    {
        $this->settings = new SettingsApi();


        $this->pages = array(array(
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
        ));

        $this->subpages = array(
            array(
                'parent_slug' => 'mali_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'mali_cpt',
                'callback' => function () {
                    echo '<h1>CPT Manager</h1>';
                }
            ),
            array(
                'parent_slug' => 'Mali_Plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'mali_taxonomies',
                'callback' => function () {
                    echo '<h1>Texonomies Manager</h1>';
                }
            )

        );
    }

    public function register()
    {
        //add_action('admin_menu', array($this, 'add_admin_pages'));

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
}
