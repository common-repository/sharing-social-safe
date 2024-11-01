<?php
/**
 * Copy
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.3
 */
$melibu_plugin_get_social_copy = get_option('melibu_plugin_get_social_copy');
// Default
?>
<form method="post" action="options.php">
    <?php settings_fields('melibu_plugin_social_copy'); ?>
    <table class="wp-list-table widefat fixed striped media">
        <tr>
            <th><?php _e('Description', 'sharing-social-safe'); ?></th>
            <th><?php _e('Setting', 'sharing-social-safe'); ?></th>
            <th><?php _e('Example', 'sharing-social-safe'); ?></th>
        </tr>
        <tr>
            <td>
                <h3><span class="dashicons dashicons-sos"></span> <?php _e('Support us', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide', 'sharing-social-safe'); ?> Copyright - Powerd by &copy; Melibu<br />
                    <small>* <?php _e('Please activate this to help us, for share this plugin', 'sharing-social-safe'); ?></small>
                </p>
            </td>
            <td>
                <p>
                    <label class="st-checkbox-switch">
                        <input type="checkbox" 
                               name="melibu_plugin_get_social_copy[onoff]" 
                               id="melibu_plugin_get_social_copy" 
                               value="on" 
                               class="st-checkbox-switch-input" 
                               <?php
                               $melibu_plugin_get_social_copy_onoff = '';
                               if (isset($melibu_plugin_get_social_copy['onoff']) && !empty($melibu_plugin_get_social_copy['onoff'])) {
                                   $melibu_plugin_get_social_copy_onoff = $melibu_plugin_get_social_copy['onoff'];
                               }
                               checked($melibu_plugin_get_social_copy_onoff, 'on');
                               ?>>
                        <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                        <span class="st-checkbox-switch-handle"></span> 
                    </label>
                </p>
            </td>
            <td><img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/copy.png" alt="" width="300" class="st-img"></td>
        </tr>
    </table>
    <p>
        <input type="submit" 
               value="<?php _e('Save', 'sharing-social-safe'); ?>" 
               class="button-primary" />
    </p>
<?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
</form>