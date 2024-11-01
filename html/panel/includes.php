<!--INCLUDES START-->
<div class="mb-l-includes">
    <h2><?php _e('Includes', 'sharing-social-safe'); ?></h2>
    <p><?php _e('Global settings that are commonly applied', 'sharing-social-safe'); ?>.</p>

    <form method="post" action="options.php">
        <?php settings_fields('melibu_plugin_social'); ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h3><span class="dashicons dashicons-flag"></span> FontAwsome</h3>
                <p><?php _e('Here you can show/hide', 'sharing-social-safe'); ?> FontAwesome CSS</p>
                <p><small><?php _e('More information about', 'sharing-social-safe'); ?> <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">FontAwesome</a>.</small></p>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <label class="st-checkbox-switch">
                    <input type="checkbox" 
                           name="melibu_plugin_get_social[fontawesome_onoff]" 
                           id="mb_plugin_get_social1" 
                           value="on" 
                           class="st-checkbox-switch-input" 
                           <?php
                           $onoff = '';
                           if (isset($mb_plugin_get_social['fontawesome_onoff']) && !empty($mb_plugin_get_social['fontawesome_onoff'])) {
                               $onoff = $mb_plugin_get_social['fontawesome_onoff'];
                           }
                           checked($onoff, 'on');
                           ?>>
                    <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                    <span class="st-checkbox-switch-handle"></span> 
                </label>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/fontawesome.png" alt="" width="300" class="st-img">
            </div>
        </div>
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'sharing-social-safe'); ?>" 
                   class="button-primary" />
        </p>
        <hr>
        <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
    </form>

    <form method="post" action="options.php">
        <?php settings_fields('melibu_plugin_social_bitly'); ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <figure>
                    <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/other/bitly.png" alt="" width="100"><br />
                    <figcaption>
                        Von <a href="//commons.wikimedia.org/w/index.php?title=User:Force92i&amp;action=edit&amp;redlink=1" class="new" title="User:Force92i (page does not exist)">Force92i</a> - <span class="int-own-work" lang="de">Eigenes Werk</span>, Gemeinfrei, <a href="https://commons.wikimedia.org/w/index.php?curid=11603089">Link</a>
                    </figcaption>
                </figure>
                <p><?php _e('Here you can disable/enable', 'sharing-social-safe'); ?> Bitly</p>
                <p><?php _e('You also have to remember that the activated shortcodes are automatically registered as a link in bitly, even if you have not clicked on, so if you clicked, the bitly url will be used', 'sharing-social-safe'); ?>.</p>
                <p><small><?php _e('More information about', 'sharing-social-safe'); ?> <a href="https://bitly.com/" target="_blank">Bitly</a>.</small></p>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
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
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/other/bitlyback.png" alt="" width="300" class="st-img">
            </div>
        </div>
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'sharing-social-safe'); ?>" 
                   class="button-primary" />
        </p>
        <hr>
        <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
    </form>

</div>