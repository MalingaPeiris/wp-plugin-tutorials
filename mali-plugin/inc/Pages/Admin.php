<?php

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();


    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(array(
            'page_title' => 'Mali Plugin',
            'menu_title' => 'Mali',
            'capability' => 'manage_options',
            'menu_slug' => 'mali_plugin',
            'callback' =>
            array($this->callbacks, 'adminDashboard'),
            'icon_url' => 'dashicons-store',
            'position' => 110
        ));
    }

    public function setSubpages()
    {
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
    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'mali_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'maliOptionsGruop')
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'mali_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'maliAdminSection'),
                'page' => 'mali_plugin'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array($this->callbacks, 'maliTextExample'),
                'page' => 'mali_plugin',
                'section' => 'mali_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example_class'
                )
            )
        );

        $this->settings->setFields($args);
    }
}
