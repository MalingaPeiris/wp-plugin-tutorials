<?php

/**
@package MaliPlugin 
 */

class MaliPluginActivate
{
    public static function activate()
    {
        flush_rewrite_rules();
    }
}
