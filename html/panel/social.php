<!--SOCIAL START-->
<div class="mb-l-social">
    <h2><?php _e('Social', 'sharing-social-safe'); ?></h2>
    <p><?php _e('Select social profiles you want to show', 'sharing-social-safe'); ?>.</p>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <button type="submit" class="button-primary"><?php _e('Save', 'sharing-social-safe'); ?></button>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>

    <h3><?php _e('Social fixed bar', 'sharing-social-safe'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Show social bar', 'sharing-social-safe'); ?></h4>
            </div>
            <div class="mb-l-form--foot mb-st-grid-9">
                <div class="st-radio-image">
                    <input type="radio" name="mb-social-get-setting-group[bar-pos]" value="no" id="no" <?php checked((isset($mbPluginSSSoptions['bar-pos']) && !empty($mbPluginSSSoptions['bar-pos']) ? $mbPluginSSSoptions['bar-pos'] : ''), 'no'); ?>>
                    <label class="st-radio-image-cart no" for="no"><?php _e('No', 'sharing-social-safe'); ?></label>
                    <input type="radio" name="mb-social-get-setting-group[bar-pos]" value="mb-sf-left" id="left" <?php checked((isset($mbPluginSSSoptions['bar-pos']) && !empty($mbPluginSSSoptions['bar-pos']) ? $mbPluginSSSoptions['bar-pos'] : ''), 'mb-sf-left'); ?>>
                    <label class="st-radio-image-cart mb-sf-left-image" for="left"><?php _e('Left', 'sharing-social-safe'); ?></label>
                    <input type="radio" name="mb-social-get-setting-group[bar-pos]" value="mb-sf-top" id="top" <?php checked((isset($mbPluginSSSoptions['bar-pos']) && !empty($mbPluginSSSoptions['bar-pos']) ? $mbPluginSSSoptions['bar-pos'] : ''), 'mb-sf-top'); ?>>
                    <label class="st-radio-image-cart mb-sf-top-image" for="top"><?php _e('Top', 'sharing-social-safe'); ?></label>
                    <input type="radio" name="mb-social-get-setting-group[bar-pos]" value="mb-sf-right" id="right" <?php checked((isset($mbPluginSSSoptions['bar-pos']) && !empty($mbPluginSSSoptions['bar-pos']) ? $mbPluginSSSoptions['bar-pos'] : ''), 'mb-sf-right'); ?>>
                    <label class="st-radio-image-cart mb-sf-right-image" for="right"><?php _e('Right', 'sharing-social-safe'); ?></label>
                    <input type="radio" name="mb-social-get-setting-group[bar-pos]" value="mb-sf-bottom" id="bottom" <?php checked((isset($mbPluginSSSoptions['bar-pos']) && !empty($mbPluginSSSoptions['bar-pos']) ? $mbPluginSSSoptions['bar-pos'] : ''), 'mb-sf-bottom'); ?>>
                    <label class="st-radio-image-cart mb-sf-bottom-image" for="bottom"><?php _e('Bottom', 'sharing-social-safe'); ?></label>
                </div>
            </div>
        </div>
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Show shares or follows', 'sharing-social-safe'); ?></h4>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <div class="st-radio">
                <input type="radio" name="mb-social-get-setting-group[bar-follow-or-share]" value="share" <?php checked((isset($mbPluginSSSoptions['bar-follow-or-share']) && !empty($mbPluginSSSoptions['bar-follow-or-share']) ? $mbPluginSSSoptions['bar-follow-or-share'] : ''), 'share'); ?> id="mb-feedback-share">
                <label class="st-radio-label" for="mb-feedback-share"><?php _e('Shares', 'sharing-social-safe'); ?></label>
                <input type="radio" name="mb-social-get-setting-group[bar-follow-or-share]" value="follow" <?php checked((isset($mbPluginSSSoptions['bar-follow-or-share']) && !empty($mbPluginSSSoptions['bar-follow-or-share']) ? $mbPluginSSSoptions['bar-follow-or-share'] : ''), 'follow'); ?> id="mb-feedback-follow">
                <label class="st-radio-label" for="mb-feedback-follow"><?php _e('Follows', 'sharing-social-safe'); ?></label>
            </div>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
        </div>
    </div>

    <h3><?php _e('Shares', 'sharing-social-safe'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Pop Up', 'sharing-social-safe'); ?></h4>
        </div>
        <div class="mb-l-form--foot mb-st-grid-4">
            <label class="st-checkbox-switch">
                <input type="checkbox" 
                       name="mb-social-get-setting-group[pop-up]" 
                       value="on" 
                       class="st-checkbox-switch-input" 
                       <?php checked((isset($mbPluginSSSoptions['pop-up']) && !empty($mbPluginSSSoptions['pop-up']) ? $mbPluginSSSoptions['pop-up'] : ''), 'on'); ?>>
                <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div>
        <div class="mb-l-form--body mb-st-grid-4">
            <p><?php _e("Enable the popup function when sharing", 'sharing-social-safe'); ?>.</p>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Width', 'sharing-social-safe'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[pop-up-width]" value="<?php echo (isset($mbPluginSSSoptions['pop-up-width']) ? $mbPluginSSSoptions['pop-up-width'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <small><?php _e('Default', 'sharing-social-safe'); ?>: <b>500</b></small>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Height', 'sharing-social-safe'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[pop-up-height]" value="<?php echo (isset($mbPluginSSSoptions['pop-up-height']) ? $mbPluginSSSoptions['pop-up-height'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <small><?php _e('Default', 'sharing-social-safe'); ?>: <b>400</b></small>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Resizable', 'sharing-social-safe'); ?></h4>
        </div>
        <div class="mb-l-form--foot mb-st-grid-4">
            <label class="st-checkbox-switch">
                <input type="checkbox" 
                       name="mb-social-get-setting-group[pop-up-resize]" 
                       value="yes" 
                       class="st-checkbox-switch-input" 
                       <?php checked((isset($mbPluginSSSoptions['pop-up-resize']) && !empty($mbPluginSSSoptions['pop-up-resize']) ? $mbPluginSSSoptions['pop-up-resize'] : ''), 'on'); ?>>
                <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div>
        <div class="mb-l-form--body mb-st-grid-4">
            <p><?php _e("Enable to allow window resize", 'sharing-social-safe'); ?>.</p>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('New Window', 'sharing-social-safe'); ?></h4>
        </div>
        <div class="mb-l-form--foot mb-st-grid-4">
            <label class="st-checkbox-switch">
                <input type="checkbox" 
                       name="mb-social-get-setting-group[pop-up-new-window]" 
                       value="on" 
                       class="st-checkbox-switch-input" 
                       <?php checked((isset($mbPluginSSSoptions['pop-up-new-window']) && !empty($mbPluginSSSoptions['pop-up-new-window']) ? $mbPluginSSSoptions['pop-up-new-window'] : ''), 'on'); ?>>
                <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div>
        <div class="mb-l-form--body mb-st-grid-4">
            <p><?php _e("Enable open in new window when sharing", 'sharing-social-safe'); ?>.</p>
        </div>
    </div>

    <h3><?php _e('Follows', 'sharing-social-safe'); ?></h3>
    <p><?php
        $acutUser = get_user_by('ID', get_current_user_id());
        /**
         * USER query
         */
        $user = new WP_User(get_current_user_id());
        $userRoles = '';
        foreach ($user->roles as $role) {
            $role = get_role($role);
            if ($role != null) {
                $userRoles .= $role->name . ','; // String all user roles
            }
        }
        echo '<b>' . __('Your social follows', 'sharing-social-safe') . ':</b> ' . $acutUser->display_name . '<br><b>' . __('Your roles', 'sharing-social-safe') . ':</b> ' . $userRoles;
        ?>
    </p>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Show follows', 'sharing-social-safe'); ?></h4>
            <p><?php _e("This setting is global for all follow buttons. Do not set this setting to otherwise is used only by an author's social networks, unless you want this", 'sharing-social-safe'); ?></p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-4">
            <select name="mb-social-get-setting-group[follow-user]"  class="mb-l-form--select" id="mb-social-select-user-allow">
                <option value='author' <?php selected((isset($mbPluginSSSoptions['follow-user']) && !empty($mbPluginSSSoptions['follow-user']) ? $mbPluginSSSoptions['follow-user'] : ''), 'author'); ?>><?php _e('Display per author (automatically)', 'sharing-social-safe'); ?></option>
                <option value='admin' <?php selected((isset($mbPluginSSSoptions['follow-user']) && !empty($mbPluginSSSoptions['follow-user']) ? $mbPluginSSSoptions['follow-user'] : ''), 'admin'); ?>><?php _e('Display only selected user settings', 'sharing-social-safe'); ?></option>
            </select>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <select name="mb-social-get-setting-group[follow-user-allowed]" class="mb-l-form--select" id="mb-social-select-user-allowed" style="display: none;">
                <?php
                $blogusers = get_users(get_current_user_id());
                if (isset($blogusers) && !empty($blogusers)) {
                    foreach ($blogusers as $user) {
                        ?> <option value='<?php echo $user->ID; ?>' <?php selected((isset($mbPluginSSSoptions['follow-user-allowed']) && !empty($mbPluginSSSoptions['follow-user-allowed']) ? $mbPluginSSSoptions['follow-user-allowed'] : ''), $user->ID); ?>><?php echo $user->display_name; ?></option><?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-7">
            <p><?php _e('Please fill your Social Profile', 'sharing-social-safe'); ?> <a href="profile.php"><?php _e('Contact Info', 'sharing-social-safe'); ?></a>.</p>
        </div>
    </div>
    <?php
    $mbsocials = array('facebook', 'googleplus', 'twitter', 'flickr', 'pinterest', 'youtube', 'github', 'tumblr', 'soundcloud', 'skype', 'xing', 'instagram', 'whatsapp', 'jsfiddle', 'snapchat', 'linkedin');
    if (isset($mbsocials) && !empty($mbsocials)) {
        ?>
        <?php foreach ($mbsocials as $mbsocial) { ?>
            <div class="mb-l-form st-clear-after">
                <div class="mb-l-form--head mb-st-grid-3">
                    <h4><?php echo ucfirst($mbsocial); ?></h4>
                </div>
                <div class="mb-l-form--body mb-st-grid-4">
                    <?php
                    if (!get_the_author_meta('ID')) {
                        $userID = get_current_user_id();
                    } else {
                        $userID = get_the_author_meta('ID');
                    }
                    $userSocial = get_the_author_meta($mbsocial, $userID);
                    if (!$userSocial) {
                        echo '<span class="mb-l-form--alert-small-success"></span> ';
                        echo '<small>';
                        _e('Link (URL) in the contactinfo is missing', 'sharing-social-safe');
                        echo '</small>';
                    } else {
                        echo '<span class="mb-l-form--alert-small-error"></span> ';
                        echo '<small>';
                        _e('Link (URL) in the contactinfo is available', 'sharing-social-safe');
                        echo '</small>';
                    }
                    ?>
                </div>
                <div class="mb-l-form--foot mb-st-grid-3">
                </div>
            </div>
        <?php } ?>
        <?php
    }
    ?>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <button type="submit" class="button-primary"><?php _e('Save', 'sharing-social-safe'); ?></button>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>  
</div>
<!--SOCIAL END-->