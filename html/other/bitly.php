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
global $MELIBU_PLUGIN_OPTIONS_02, $melibuPluginSSSBitly;
$mbPluginSSSbitlySettings = $MELIBU_PLUGIN_OPTIONS_02->bitly();
?>
<form method="post" action="options.php">
    <?php settings_fields('melibu_plugin_social_bitly'); ?>
    <table class="wp-list-table widefat fixed striped media" id="mb-plugin-sss-oauth-anker">
        <tr>
            <th><?php _e('Description', 'sharing-social-safe'); ?></th>
            <th><?php _e('Setting', 'sharing-social-safe'); ?></th>
            <th><?php _e('Example', 'sharing-social-safe'); ?></th>
        </tr>
        <tr>
            <td>
                <figure>
                    <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/other/bitly.png" alt="" width="100"><br />
                    <figcaption>
                        Von <a href="//commons.wikimedia.org/w/index.php?title=User:Force92i&amp;action=edit&amp;redlink=1" class="new" title="User:Force92i (page does not exist)">Force92i</a> - <span class="int-own-work" lang="de">Eigenes Werk</span>, Gemeinfrei, <a href="https://commons.wikimedia.org/w/index.php?curid=11603089">Link</a>
                    </figcaption>
                </figure>
                <p><?php _e('Here you can disable/enable', 'sharing-social-safe'); ?> Bitly</p>
                <p><?php _e('You also have to remember that the activated shortcodes are automatically registered as a link in bitly, even if you have not clicked on, so if you clicked, the bitly url will be used', 'sharing-social-safe'); ?>.</p>
                <p><small><?php _e('More information about', 'sharing-social-safe'); ?> <a href="https://bitly.com/" target="_blank">Bitly</a>.</small></p>
            </td>
            <td>
                <p>
                    <?php _e('Click here to authorize using your bitly account', 'sharing-social-safe'); ?>
                    <?php $melibuPluginSSSBitly->login(); ?>
                </p>

                <?php if (!$mbPluginSSSbitlySettings['access_token']) { ?>
                    <div>
                        <span class="dashicons dashicons-wordpress"></span> <span class="dashicons dashicons-leftright"></span>
                        <span class="mb-badge red">
                            <?php _e('bitly not connected', 'sharing-social-safe'); ?>
                        </span>
                    </div>
                <?php } else if ($mbPluginSSSbitlySettings['access_token'] == 'INVALID_LOGIN') { ?>
                    <div class="st-alert st-alert-warning">
                        <h3><?php _e('Error', 'sharing-social-safe'); ?></h3>
                        <p><?php echo $mbPluginSSSbitlySettings['access_token']; ?></p>
                    </div>
                <?php } else if ($mbPluginSSSbitlySettings['login'] && $mbPluginSSSbitlySettings['access_token']) { ?>

                    <input type="hidden" 
                           name="melibu_plugin_get_social_bitly_oauth_name" 
                           id="melibu_plugin_get_social_bitly_oauth_name" 
                           value="<?php echo $mbPluginSSSbitlySettings['login']; ?>"
                           class="mb-input"/>

                    <label for="melibu_plugin_get_social_bitly_oauth"><?php _e('Access Token', 'sharing-social-safe'); ?></label>
                    <input type="text" 
                           name="melibu_plugin_get_social_bitly_oauth" 
                           id="melibu_plugin_get_social_bitly_oauth" 
                           value="<?php echo $mbPluginSSSbitlySettings['access_token']; ?>"
                           class="mb-input"
                           readonly="readonly"/>

                    <div>
                        <span class="dashicons dashicons-wordpress"></span> <span class="dashicons dashicons-leftright"></span>
                        <span class="mb-badge green">
                            <?php _e('bitly connected', 'sharing-social-safe'); ?> with <?php echo $mbPluginSSSbitlySettings['login']; ?>
                        </span>
                    </div>

                    <p>
                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibu_plugin_get_social_bitly[onoff]" 
                                   id="mb_plugin_get_social_bitly" 
                                   value="on" 
                                   class="st-checkbox-switch-input" 
                                   <?php checked($mbPluginSSSbitlySettings['onoff'], 'on'); ?> />
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span> 
                        </label>
                        <small><?php _e('Enable to check on bitly how often your backlinks clicked', 'sharing-social-safe'); ?></small>
                    </p>
                <?php } ?>
            </td>
            <td>
                <div class="st-thumbnail">
                    <div class="st-image">
                        <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/other/bitlyback.png" alt="" width="300" class="st-img">
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <p>
        <input type="submit" 
               value="<?php _e('Save', 'sharing-social-safe'); ?>" 
               class="button-primary" />
    </p>
    <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
</form>