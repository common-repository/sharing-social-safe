<!--WIDGET START-->
<div class="mb-l-widget">
    <h2><?php _e('Modal', 'sharing-social-safe'); ?></h2>
    <p><?php _e('Here you can set which social networks you want to see on the modal', 'sharing-social-safe'); ?>.</p>
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
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4>Modal</h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <label class="st-checkbox-switch">
                <input type="checkbox" 
                       name="mb-social-get-setting-group[modal]" 
                       value="on" 
                       class="st-checkbox-switch-input" 
                       <?php checked((isset($mbPluginSSSoptions['modal']) && !empty($mbPluginSSSoptions['modal']) ? $mbPluginSSSoptions['modal'] : ''), 'on'); ?>>
                <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Title', 'sharing-social-safe'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[modal-title]" value="<?php echo (isset($mbPluginSSSoptions['modal-title']) ? $mbPluginSSSoptions['modal-title'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <small><?php _e('Default', 'sharing-social-safe'); ?>: <b><?php _e('Share', 'sharing-social-safe'); ?></b></small>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <?php
    $widgetCheckboxes = array(
        'wordpress',
        'googleplus',
        'facebook',
        'twitter',
        'xing',
        'linkedin',
        'tumblr',
        'reddit',
        'digg',
        'delicious',
        'stumbleupon',
        'getpocket',
        'pinterest',
        'whatsapp',
        'mail',
        'print'
    );
    foreach ($widgetCheckboxes as $mbsocial) {
        ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php echo ucfirst($mbsocial); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <label class="st-checkbox-switch">
                    <input type="checkbox" 
                           name="mb-social-get-setting-group[modal-<?php echo $mbsocial; ?>]" 
                           value="<?php echo $mbsocial; ?>" 
                           class="st-checkbox-switch-input" 
                           <?php checked((isset($mbPluginSSSoptions["modal-" . $mbsocial]) ? $mbPluginSSSoptions["modal-" . $mbsocial] : ''), $mbsocial); ?>>
                    <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                    <span class="st-checkbox-switch-handle"></span> 
                </label>
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
        </div>
    <?php } ?>
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
<!--WIDGET END-->