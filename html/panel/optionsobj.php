<!--OPTIONS START-->
<div class="mb-l-optionsobj">
    <h2><?php _e('Options OBJ', 'sharing-social-safe'); ?></h2>
    <p><?php _e('See the globally object to use', 'sharing-social-safe'); ?></p>
    <?php
    $melibu_sss = $wpdb->prefix . "melibu_sss";
    $result = $wpdb->get_results("SELECT * FROM " . $melibu_sss . " WHERE name='panel_options'");
    if (isset($result[0])) {
        echo '<h3>' . __('Options OBJ', 'sharing-social-safe') . '</h3>';
        echo '<pre>';
        var_dump($result[0]);
        echo '</pre>';
        echo '<h3>' . __('Options OBJ (Array)', 'sharing-social-safe') . '</h3>';
        echo '<pre>';
        var_dump(unserialize($result[0]->value));
        echo '</pre>';
    }
    ?>
</div>
<!--OPTIONS END-->