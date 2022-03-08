<?php

/**
@package MaliPlugin 
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        //enqueue all scripts
        wp_enqueue_style('mypluginstyle',$this->plugin . 'assets/mystyle.css');
        wp_enqueue_script('mypluginscript', $this->plugin . 'assets/myscript.js');
    }
}
