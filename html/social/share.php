<?php
/**
 * Share
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.3
 */
$melibu_plugin_get_social_share = get_option('melibu_plugin_get_social_share');
// Default
$melibu_plugin_get_social_share_onoff = 'off';
if (isset($melibu_plugin_get_social_share['onoff']) && !empty($melibu_plugin_get_social_share['onoff'])) {
    $melibu_plugin_get_social_share_onoff = $melibu_plugin_get_social_share['onoff'];
}
$melibu_plugin_get_social_share_contentbefore = 'off';
if (isset($melibu_plugin_get_social_share['contentbefore']) && !empty($melibu_plugin_get_social_share['contentbefore'])) {
    $melibu_plugin_get_social_share_contentbefore = $melibu_plugin_get_social_share['contentbefore'];
}
$melibu_plugin_get_social_share_contentafter = 'off';
if (isset($melibu_plugin_get_social_share['contentafter']) && !empty($melibu_plugin_get_social_share['contentafter'])) {
    $melibu_plugin_get_social_share_contentafter = $melibu_plugin_get_social_share['contentafter'];
}

$melibu_plugin_get_social_count = get_option('melibu_plugin_get_social_count');
// Default
$melibu_plugin_get_social_count_onoff = '';
if (isset($melibu_plugin_get_social_count['onoff']) && !empty($melibu_plugin_get_social_count['onoff'])) {
    $melibu_plugin_get_social_count_onoff = $melibu_plugin_get_social_count['onoff'];
}
$melibu_plugin_get_social_count_singlecount = '';
if (isset($melibu_plugin_get_social_count['singlecount']) && !empty($melibu_plugin_get_social_count['singlecount'])) {
    $melibu_plugin_get_social_count_singlecount = $melibu_plugin_get_social_count['singlecount'];
}
$melibu_plugin_get_social_privacy_opt = get_option('melibu_plugin_get_social_privacy_opt');
// Default
$melibu_plugin_get_social_privacy_opt_onoff = '';
if (isset($melibu_plugin_get_social_privacy_opt['onoff']) && !empty($melibu_plugin_get_social_privacy_opt['onoff'])) {
    $melibu_plugin_get_social_privacy_opt_onoff = $melibu_plugin_get_social_privacy_opt['onoff'];
}
?>
<form method="post" action="options.php">
    <?php settings_fields('melibu_plugin_social_share'); ?>
    <table class="wp-list-table widefat fixed striped media">
        <tr>
            <th><?php _e('Description', 'sharing-social-safe'); ?></th>
            <th><?php _e('Setting', 'sharing-social-safe'); ?></th>
            <th><?php _e('Example', 'sharing-social-safe'); ?></th>
        </tr>
<!--        <tr>
            <td>
                <h3><span class="dashicons dashicons-share"></span> <?php // _e('Title short share link', 'sharing-social-safe');       ?></h3>
                <p><?php // _e('Here you can show/hide Share Buttons with Modal under the Title.', 'sharing-social-safe');       ?><br />
                    <small>* <?php // _e('Activate this to share quickly', 'sharing-social-safe');       ?></small></p>
            </td>
            <td>
                <p>
                    <input type="checkbox" 
                           name="melibu_plugin_get_social_share[onoff]" 
                           id="melibu_plugin_get_social_share" 
                           value="on" 
                           class="st-checkbox-switch" 
        <?php // checked($melibu_plugin_get_social_share_onoff, 'on'); ?> />
                    <label for="melibu_plugin_get_social_share"><?php // _e('Turn On', 'sharing-social-safe');       ?></label>
                </p>
            </td>
        </tr>-->
        <tr>
            <td>
                <h3><span class="dashicons dashicons-share"></span> <?php _e('Content before short share link', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide Share Buttons with Modal before the Content', 'sharing-social-safe'); ?>.<br />
                    <small>* <?php _e('Activate this to share quickly', 'sharing-social-safe'); ?></small></p>
            </td>
            <td>
                <p>
                    <label class="st-checkbox-switch">
                        <input type="checkbox" 
                               name="melibu_plugin_get_social_share[contentbefore]" 
                               id="melibu_plugin_get_social_share_contentbefore" 
                               value="on" 
                               class="st-checkbox-switch-input" 
                               <?php checked($melibu_plugin_get_social_share_contentbefore, 'on'); ?> />
                        <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                        <span class="st-checkbox-switch-handle"></span>
                    </label>
                </p>
            </td>
            <td><img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/contentbefore.png" alt="" width="300" class="st-img"></td>
        </tr>
        <tr>
            <td>
                <h3><span class="dashicons dashicons-share"></span> <?php _e('Content after short share link', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide Share Buttons with Modal after the Content', 'sharing-social-safe'); ?>.<br />
                    <small>* <?php _e('Activate this to share quickly', 'sharing-social-safe'); ?></small></p>
            </td>
            <td>
                <p>
                    <label class="st-checkbox-switch">
                        <input type="checkbox" 
                               name="melibu_plugin_get_social_share[contentafter]" 
                               id="melibu_plugin_get_social_share_contentafter" 
                               value="on" 
                               class="st-checkbox-switch-input" 
                               <?php checked($melibu_plugin_get_social_share_contentafter, 'on'); ?> />
                        <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                        <span class="st-checkbox-switch-handle"></span>
                    </label>
                </p>
            </td>
            <td><img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/contentafter.png" alt="" width="300" class="st-img"></td>
        </tr>
    </table>
    <p>
        <input type="submit" 
               value="<?php _e('Save', 'sharing-social-safe'); ?>" 
               class="button-primary" />
    </p>
    <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
</form>
<form method="post" action="options.php">
    <?php settings_fields('melibu_plugin_social_count'); ?>
    <table class="wp-list-table widefat fixed striped media">
        <tr>
            <th><?php _e('Description', 'sharing-social-safe'); ?></th>
            <th><?php _e('Setting', 'sharing-social-safe'); ?></th>
            <th><?php _e('Example', 'sharing-social-safe'); ?></th>
        </tr>
        <tr>
            <td>
                <h3><span class="dashicons dashicons-megaphone"></span> <?php _e('Showing how often divided', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide the count of shares', 'sharing-social-safe'); ?><br />
            </td>
            <td>
                <p>
                    <label class="st-checkbox-switch">
                        <input type="checkbox" 
                               name="melibu_plugin_get_social_count[onoff]" 
                               id="melibu_plugin_get_social_count" 
                               value="on" 
                               class="st-checkbox-switch-input" 
                               <?php checked($melibu_plugin_get_social_count_onoff, 'on'); ?> />
                        <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                        <span class="st-checkbox-switch-handle"></span>
                    </label>
                </p>
            </td>
            <td><img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/divided.png" alt="" width="300" class="st-img"></td>
        </tr>
        <tr>
            <td>
                <h3><span class="dashicons dashicons-megaphone"></span> <?php _e('Showing how often divided on button', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide the count of shares on button', 'sharing-social-safe'); ?><br />
            </td>
            <td>
                <p>
                    <label class="st-checkbox-switch">
                        <input type="checkbox" 
                               name="melibu_plugin_get_social_count[singlecount]" 
                               id="melibu_plugin_get_social_count_singlecount" 
                               value="on" 
                               class="st-checkbox-switch-input" 
                               <?php checked($melibu_plugin_get_social_count_singlecount, 'on'); ?> />
                        <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                        <span class="st-checkbox-switch-handle"></span>
                    </label>
                </p>
            </td>
            <td><img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/divided-button.png" alt="" width="300" class="st-img"></td>
        </tr>
    </table>  
    <p>
        <input type="submit" 
               value="<?php _e('Save', 'sharing-social-safe'); ?>" 
               class="button-primary" />
    </p>
    <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
</form>
<form method="post" action="options.php">
    <?php settings_fields('melibu_plugin_social_privacy_opt'); ?>
    <table class="wp-list-table widefat fixed striped media">
        <tr>
            <th><?php _e('Description', 'sharing-social-safe'); ?></th>
            <th><?php _e('Setting', 'sharing-social-safe'); ?></th>
            <th><?php _e('Example', 'sharing-social-safe'); ?></th>
        </tr>
        <tr>
            <td>
                <h3><span class="dashicons dashicons-media-spreadsheet"></span> <?php _e('Privacy Box', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide the privacy box', 'sharing-social-safe'); ?><br />
            </td>
            <td>
                <p>
                    <label class="st-checkbox-switch">
                        <input type="checkbox" 
                               name="melibu_plugin_get_social_privacy_opt[onoff]" 
                               id="melibu_plugin_get_social_privacy_opt" 
                               value="on" 
                               class="st-checkbox-switch-input" 
                               <?php checked($melibu_plugin_get_social_privacy_opt_onoff, 'on'); ?> />
                        <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                        <span class="st-checkbox-switch-handle"></span>
                    </label>
                </p>
            </td>
            <td><img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/privacybox.png" alt="" width="300" class="st-img"></td>
        </tr>
    </table>
    <p>
        <input type="submit" 
               value="<?php _e('Save', 'sharing-social-safe'); ?>" 
               class="button-primary" />
    </p>
    <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
</form>