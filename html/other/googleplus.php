<?php
/**
 * FontAwesome
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.6.0
 */
global $MELIBU_PLUGIN_OPTIONS_02, $melibuPluginSSSgoogle;
$mbPluginSSSgoogleSettings = $MELIBU_PLUGIN_OPTIONS_02->google();
?>
<table class="wp-list-table widefat fixed striped media" id="mb-plugin-sss-oauth-anker">
    <tr>
        <th><?php _e('Description', 'sharing-social-safe'); ?></th>
        <th><?php _e('Setting', 'sharing-social-safe'); ?></th>
        <th><?php _e('Example', 'sharing-social-safe'); ?></th>
    </tr>
    <tr>
        <td>
            <figure>
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/other/googleplus.png" alt="" width="100"><br />
                <figcaption>
                    By Google - <a rel="nofollow" class="external free" href="https://plus.google.com/">https://plus.google.com/</a>, Public Domain, <a href="https://commons.wikimedia.org/w/index.php?curid=15648820">Link</a>
                </figcaption>
            </figure>
            <p><?php _e('Here you can disable/enable', 'sharing-social-safe'); ?> Bitly</p>
            <p><small><?php _e('More information about', 'sharing-social-safe'); ?> <a href="https://bitly.com/" target="_blank">Bitly</a>.</small></p>
        </td>
        <td>
            <form method="post" action="options.php">
                <?php settings_fields('melibu_plugin_social_google'); ?>

                <p><?php _e('Click here to authorize using your google+ account', 'sharing-social-safe'); ?></p>

                <?php $melibuPluginSSSgoogle->login(); ?>

                <?php if (!$mbPluginSSSfacebookSettings['access_token']) { ?>
                    <div>
                        <span class="dashicons dashicons-wordpress"></span> <span class="dashicons dashicons-leftright"></span>
                        <span class="mb-badge red">
                            <?php _e('google not connected', 'sharing-social-safe'); ?>
                        </span>
                    </div>
                <?php } else if ($mbPluginSSSgoogleSettings['access_token'] == 'INVALID_LOGIN') { ?>
                    <div class="st-alert st-alert-warning">
                        <h3><?php _e('Error', 'sharing-social-safe'); ?></h3>
                        <p><?php echo $mbPluginSSSgoogleSettings['access_token']; ?></p>
                    </div>
                <?php } else if ($mbPluginSSSgoogleSettings['login'] && $mbPluginSSSgoogleSettings['access_token']) { ?>
                    <div>
                        <span class="dashicons dashicons-wordpress"></span> <span class="dashicons dashicons-leftright"></span>
                        <span class="mb-badge green">
                            <?php _e('google connected', 'sharing-social-safe'); ?>
                        </span>
                    </div>
                    <input type="hidden" 
                           name="melibu_plugin_get_social_google_oauth_name" 
                           id="melibu_plugin_get_social_google_oauth_name" 
                           value="<?php echo $mbPluginSSSgoogleSettings['login']; ?>"
                           class="mb-input"/>
                    <label for="melibu_plugin_get_social_google_oauth"><?php _e('Access Token', 'sharing-social-safe'); ?></label>
                    <input type="text" 
                           name="melibu_plugin_get_social_google_oauth" 
                           id="melibu_plugin_get_social_google_oauth" 
                           value="<?php echo $mbPluginSSSgoogleSettings['access_token']; ?>"
                           class="mb-input"
                           readonly="readonly"/>

                    <p>
                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibu_plugin_get_social_google[onoff]" 
                                   id="melibu_plugin_get_social_google" 
                                   value="on" 
                                   class="st-checkbox-switch-input" 
                                   <?php checked($mbPluginSSSgoogleSettings['onoff'], 'on'); ?> />
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span> 
                        </label><br />
                        <small><?php _e('Enable to check on google plus how often your backlinks clicked', 'sharing-social-safe'); ?></small>
                    </p>
                    <p>
                        <input type="submit" 
                               value="<?php _e('Save', 'sharing-social-safe'); ?>" 
                               class="button-primary" />
                    </p>
                <?php } ?>
                <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
            </form>
        </td>
        <td>
            <div class="st-thumbnail">
                <div class="st-image">
                    <!--<img src="<?php // echo MELIBU_PLUGIN_URL_02;       ?>img/other/bitlyback.png" alt="" width="300" class="st-img">-->
                </div>
            </div>
        </td>
    </tr>
</table>