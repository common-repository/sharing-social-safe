<!--TABS START-->
<div class="mb-l-settings">
    <h2><?php _e('Settings', 'sharing-social-safe'); ?></h2>
    <p><?php _e('Global settings that are commonly applied', 'sharing-social-safe'); ?>.</p>

    <form method="post" action="options.php">
        <?php settings_fields('melibu_plugin_social_share'); ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h3><span class="dashicons dashicons-share"></span> <?php _e('Content before short share link', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide Share Buttons with Modal before the Content', 'sharing-social-safe'); ?>.</p>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <label class="st-checkbox-switch">
                    <input type="checkbox" 
                           name="melibu_plugin_get_social_share[contentbefore]" 
                           id="melibu_plugin_get_social_share_contentbefore" 
                           value="on" 
                           class="st-checkbox-switch-input" 
                           <?php
                           $melibu_plugin_get_social_share_contentbefore = 'off';
                           if (isset($melibu_plugin_get_social_share['contentbefore']) && !empty($melibu_plugin_get_social_share['contentbefore'])) {
                               $melibu_plugin_get_social_share_contentbefore = $melibu_plugin_get_social_share['contentbefore'];
                           }
                           checked($melibu_plugin_get_social_share_contentbefore, 'on');
                           ?>>
                    <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                    <span class="st-checkbox-switch-handle"></span>
                </label>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/contentbefore.png" alt="" width="300" class="st-img">
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h3><span class="dashicons dashicons-share"></span> <?php _e('Content after short share link', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide Share Buttons with Modal after the Content', 'sharing-social-safe'); ?>.</p>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <label class="st-checkbox-switch">
                    <input type="checkbox" 
                           name="melibu_plugin_get_social_share[contentafter]" 
                           id="melibu_plugin_get_social_share_contentafter" 
                           value="on" 
                           class="st-checkbox-switch-input" 
                           <?php
                           $melibu_plugin_get_social_share_contentafter = 'off';
                           if (isset($melibu_plugin_get_social_share['contentafter']) && !empty($melibu_plugin_get_social_share['contentafter'])) {
                               $melibu_plugin_get_social_share_contentafter = $melibu_plugin_get_social_share['contentafter'];
                           }
                           checked($melibu_plugin_get_social_share_contentafter, 'on');
                           ?>>
                    <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                    <span class="st-checkbox-switch-handle"></span>
                </label>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/contentafter.png" alt="" width="300" class="st-img">
            </div>
        </div>
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'sharing-social-safe'); ?>" 
                   class="button-primary">
        </p>
        <hr> 
        <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
    </form>

    <form method="post" action="options.php">
        <?php settings_fields('melibu_plugin_social_count'); ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h3><span class="dashicons dashicons-megaphone"></span> <?php _e('Showing how often divided', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide the count of shares', 'sharing-social-safe'); ?></p>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <label class="st-checkbox-switch">
                    <input type="checkbox" 
                           name="melibu_plugin_get_social_count[onoff]" 
                           id="melibu_plugin_get_social_count" 
                           value="on" 
                           class="st-checkbox-switch-input" 
                           <?php
                           $melibu_plugin_get_social_count_onoff = '';
                           if (isset($melibu_plugin_get_social_count['onoff']) && !empty($melibu_plugin_get_social_count['onoff'])) {
                               $melibu_plugin_get_social_count_onoff = $melibu_plugin_get_social_count['onoff'];
                           }
                           checked($melibu_plugin_get_social_count_onoff, 'on');
                           ?>>
                    <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                    <span class="st-checkbox-switch-handle"></span>
                </label>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/divided.png" alt="" width="300" class="st-img">
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h3><span class="dashicons dashicons-megaphone"></span> <?php _e('Showing how often divided on button', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide the count of shares on button', 'sharing-social-safe'); ?></p>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <label class="st-checkbox-switch">
                    <input type="checkbox" 
                           name="melibu_plugin_get_social_count[singlecount]" 
                           id="melibu_plugin_get_social_count_singlecount" 
                           value="on" 
                           class="st-checkbox-switch-input" 
                           <?php
                           $melibu_plugin_get_social_count_singlecount = '';
                           if (isset($melibu_plugin_get_social_count['singlecount']) && !empty($melibu_plugin_get_social_count['singlecount'])) {
                               $melibu_plugin_get_social_count_singlecount = $melibu_plugin_get_social_count['singlecount'];
                           }
                           checked($melibu_plugin_get_social_count_singlecount, 'on');
                           ?>>
                    <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                    <span class="st-checkbox-switch-handle"></span>
                </label>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/divided-button.png" alt="" width="300" class="st-img">
            </div>
        </div>
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'sharing-social-safe'); ?>" 
                   class="button-primary">
        </p>
        <hr> 
        <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
    </form>

    <form method="post" action="options.php">
        <?php settings_fields('melibu_plugin_social_privacy_opt'); ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h3><span class="dashicons dashicons-media-spreadsheet"></span> <?php _e('Privacy Box', 'sharing-social-safe'); ?></h3>
                <p><?php _e('Here you can show/hide the privacy box', 'sharing-social-safe'); ?></p>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <label class="st-checkbox-switch">
                    <input type="checkbox" 
                           name="melibu_plugin_get_social_privacy_opt[onoff]" 
                           id="melibu_plugin_get_social_privacy_opt" 
                           value="on" 
                           class="st-checkbox-switch-input" 
                           <?php
                           $melibu_plugin_get_social_privacy_opt_onoff = '';
                           if (isset($melibu_plugin_get_social_privacy_opt['onoff']) && !empty($melibu_plugin_get_social_privacy_opt['onoff'])) {
                               $melibu_plugin_get_social_privacy_opt_onoff = $melibu_plugin_get_social_privacy_opt['onoff'];
                           }
                           checked($melibu_plugin_get_social_privacy_opt_onoff, 'on');
                           ?>>
                    <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                    <span class="st-checkbox-switch-handle"></span>
                </label>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/privacybox.png" alt="" width="300" class="st-img">
            </div>
        </div>
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'sharing-social-safe'); ?>" 
                   class="button-primary">
        </p>
        <hr> 
        <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
    </form>

    <form method="post" action="options.php">
        <?php settings_fields('melibu_plugin_social_copy'); ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <p><?php _e('Here you can show/hide', 'sharing-social-safe'); ?> Copyright - Powerd by &copy; Melibu<br />
                    <small>* <?php _e('Please activate this to help us, for share this plugin', 'sharing-social-safe'); ?></small>
                </p>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
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
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
                <img src="<?php echo MELIBU_PLUGIN_URL_02; ?>img/settings/copy.png" alt="" width="300" class="st-img">
            </div>
        </div>
        <p>
            <input type="submit" 
                   value="<?php _e('Save', 'sharing-social-safe'); ?>" 
                   class="button-primary">
        </p>
        <hr> 
        <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
    </form>

</div>
<!--TABS END-->