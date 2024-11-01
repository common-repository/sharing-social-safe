<?php
/**
 * FontAwesome
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
?>
<form method="post" action="options.php">
    <?php settings_fields('melibu_plugin_social'); ?>
    <table class="wp-list-table widefat fixed striped media">
        <tr>
            <th><?php _e('Description', 'sharing-social-safe'); ?></th>
            <th><?php _e('Setting', 'sharing-social-safe'); ?></th>
            <th><?php _e('Example', 'sharing-social-safe'); ?></th>
        </tr>
        <tr>
            <td>
                <h3><span class="dashicons dashicons-flag"></span> FontAwsome</h3>
                <p><?php _e('Here you can show/hide', 'sharing-social-safe'); ?> FontAwesome CSS</p>
                <p><small><?php _e('More information about', 'sharing-social-safe'); ?> <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">FontAwesome</a>.</small></p>
            </td>
            <td>
                <p>
                    <label class="st-checkbox-switch">
                        <input type="checkbox" 
                               name="melibu_plugin_get_social[fontawesome_onoff]" 
                               id="mb_plugin_get_social1" 
                               value="on" 
                               class="st-checkbox-switch-input" 
                               <?php
                               if (isset($mb_plugin_get_social['fontawesome_onoff']) && !empty($mb_plugin_get_social['fontawesome_onoff'])) {
                                   $onoff = $mb_plugin_get_social['fontawesome_onoff'];
                               }
                               checked($onoff, 'on');
                               ?>>
                        <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                        <span class="st-checkbox-switch-handle"></span> 
                    </label>
                </p>
            </td>
            <td><img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/fontawesome.png" alt="" width="300" class="st-img"></td>
        </tr>
    </table>
    <p>
        <input type="submit" 
               value="<?php _e('Save', 'sharing-social-safe'); ?>" 
               class="button-primary" />
    </p>
    <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
</form>