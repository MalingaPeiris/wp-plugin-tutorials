<?php

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function maliOptionsGruop($input)
    {
        return $input;
    }

    public function maliAdminSection()
    {
        echo 'admin section is active';
    }
    public function maliTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="input here"></input>';
    }
}
