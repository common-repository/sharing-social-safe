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
global $MELIBU_PLUGIN_OPTIONS_02, $melibuPluginSSStwitter;
$mbPluginSSStwitterSettings = $MELIBU_PLUGIN_OPTIONS_02->twitter();
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
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/other/twitter.png" alt="" width="100"><br />
                <figcaption>
                    Von Der ursprünglich hochladende Benutzer war <a href="https://en.wikipedia.org/wiki/User:GageSkidmore" class="extiw" title="wikipedia:User:GageSkidmore">GageSkidmore</a> in der <a href="https://en.wikipedia.org/wiki/" class="extiw" title="wikipedia:">Wikipedia auf Englisch</a> - Übertragen aus&nbsp;<span class="plainlinks"><a class="external text" href="//en.wikipedia.org">en.wikipedia</a></span>&nbsp;nach Commons&nbsp;durch&nbsp;<a href="//commons.wikimedia.org/wiki/User:Wcam" title="User:Wcam">Wcam</a>&nbsp;mithilfe des <a href="//tools.wmflabs.org/commonshelper/" class="extiw" title="toollabs:commonshelper/">CommonsHelper</a>., Gemeinfrei, <a href="https://commons.wikimedia.org/w/index.php?curid=15869489">Link</a>
                </figcaption>
            </figure>
            <p><?php _e('Here you can disable/enable', 'sharing-social-safe'); ?> Bitly</p>
            <p><small><?php _e('More information about', 'sharing-social-safe'); ?> <a href="https://twitter.com/" target="_blank">twitter</a>.</small></p>
        </td>
        <td>
            <form method="post" action="options.php">
                <?php settings_fields('melibu_plugin_social_twitter'); ?>

                <p><?php _e('Click here to authorize using your twitter account', 'sharing-social-safe'); ?></p>

                <?php $melibuPluginSSStwitter->login(); ?>

                <?php if (!$mbPluginSSStwitterSettings['access_token']) { ?>
                    <div>
                        <span class="dashicons dashicons-wordpress"></span> <span class="dashicons dashicons-leftright"></span>
                        <span class="mb-badge red">
                            <?php _e('twitter not connected', 'sharing-social-safe'); ?>
                        </span>
                    </div>
                <?php } else if ($mbPluginSSStwitterSettings['access_token'] == 'INVALID_LOGIN') { ?>
                    <div class="st-alert st-alert-warning">
                        <h3><?php _e('Error', 'sharing-social-safe'); ?></h3>
                        <p><?php echo $mbPluginSSStwitterSettings['access_token']; ?></p>
                    </div>
                <?php } else if ($mbPluginSSStwitterSettings['login'] && $mbPluginSSStwitterSettings['access_token']) { ?>
                    <div>
                        <span class="dashicons dashicons-wordpress"></span> <span class="dashicons dashicons-leftright"></span>
                        <span class="mb-badge green">
                            <?php _e('twitter connected', 'sharing-social-safe'); ?>
                        </span>
                    </div>
                    <input type="hidden" 
                           name="melibu_plugin_get_social_twitter_oauth_name" 
                           id="melibu_plugin_get_social_twitter_oauth_name" 
                           value="<?php echo $mbPluginSSStwitterSettings['login']; ?>"
                           class="mb-input"/>
                    <label for="melibu_plugin_get_social_twitter_oauth"><?php _e('Access Token', 'sharing-social-safe'); ?></label>
                    <input type="text" 
                           name="melibu_plugin_get_social_twitter_oauth" 
                           id="melibu_plugin_get_social_twitter_oauth" 
                           value="<?php echo $mbPluginSSStwitterSettings['access_token']; ?>"
                           class="mb-input"
                           readonly="readonly"/>

                    <p>
                        <label class="st-checkbox-switch">
                            <input type="checkbox" 
                                   name="melibu_plugin_get_social_twitter[onoff]" 
                                   id="melibu_plugin_get_social_twitter" 
                                   value="on" 
                                   class="mb_switch-input" 
                                   <?php checked($mbPluginSSStwitterSettings['onoff'], 'on'); ?> />
                            <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                            <span class="st-checkbox-switch-handle"></span> 
                        </label><br />
                        <small><?php _e('Enable to check on twitter how often your backlinks clicked', 'sharing-social-safe'); ?></small>
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
                    <!--<img src="<?php // echo MELIBU_PLUGIN_URL_02;    ?>img/other/bitlyback.png" alt="" width="300" class="st-img">-->
                </div>
            </div>
        </td>
    </tr>
</table>