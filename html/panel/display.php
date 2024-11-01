<!--DISPLAY START-->
<div class="mb-l-display">
    <h2><?php _e('Display', 'sharing-social-safe'); ?></h2>
    <p><?php _e('Select where you want the social buttons to appear on your posts, pages and custom posts', 'sharing-social-safe'); ?>.</p>
    <h3><?php _e('Show on', 'sharing-social-safe'); ?></h3>
    <form action="admin.php?page=melibu-plugin-social-admin-control-menu-0" method="post">
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
        <?php
        global $MELIBU_PLUGIN_OPTIONS_02;
        if (is_array($MELIBU_PLUGIN_OPTIONS_02->post_types())) {
            foreach ($MELIBU_PLUGIN_OPTIONS_02->post_types() as $post_type) {
                ?>
                <div class="mb-l-form st-clear-after">
                    <div class="mb-l-form--head mb-st-grid-4">
                        <h4><?php echo ucfirst($post_type . 's'); ?></h4>
                    </div>
                    <div class="mb-l-form--body mb-st-grid-4">
                        <select name="mb-social-get-setting-group[<?php echo $post_type; ?>]"  class="mb-l-form--select">
                            <option value='no' <?php selected((isset($mbPluginSSSoptions[$post_type]) ? $mbPluginSSSoptions[$post_type] : ''), 'no'); ?>><?php _e('No', 'sharing-social-safe'); ?></option>
                            <option value='allow' <?php selected((isset($mbPluginSSSoptions[$post_type]) ? $mbPluginSSSoptions[$post_type] : 'allow'), 'allow'); ?>><?php _e('Allow', 'sharing-social-safe'); ?></option>
                        </select>
                    </div>
                    <div class="mb-l-form--foot mb-st-grid-4">
                    </div>
                </div>
                <?php
            }
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
<!--DISPLAY END-->