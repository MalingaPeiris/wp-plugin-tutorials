<div class="wrap">
    <h1>Mali Plugin Required</h1>
    <?php settings_errors() ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a></li>
        <li><a href="#tab-2">Updates</a></li>
        <li><a href="#tab-3">About</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
    <form method="post" action="options.php">
        <?php
        settings_fields('mali_options_group');
        do_settings_sections('mali_plugin');
        submit_button();
        ?>
    </form>
    </div>

    <div class="tab-pane" id="tab-2">
        <h3>Updates</h3>
    </div>
    <div class="tab-pane" id="tab-3">
        <h3>About</h3>
    </div>
</div>
</div>