<div class="wrap">
    <h1>Mali Plugin Required</h1>
    <?php settings_errors() ?>

    <form method="post" action="options.php">
        <?php
        settings_fields('mali_options_group');
        do_settings_sections('mali_plugin');
        submit_button();
        ?>
    </form>
</div>