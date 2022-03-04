<?php

/**
@package MaliPlugin 
 */

class MaliPluginDeactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
