<?php
// OPTIONS
$melibu_social_check_result = $MELIBU_PLUGIN_SHARE->get_by_name('button_design');
$melibu_social_check_set = 'long';
if ($melibu_social_check_result) {
    $melibu_social_check_set = $melibu_social_check_result;
}
$melibu_plugin_get_social_privacy = get_option('melibu_plugin_get_social_privacy');
?>
<!--PERMISSION START-->
<div class="mb-l-permission">
    <h2><?php _e('Privacy defaults', 'sharing-social-safe'); ?></h2>
    <p><?php _e('Your Information to the Users', 'sharing-social-safe'); ?>.</p>
    <p><?php _e('Here appears after save your information to your users. (See preview)', 'sharing-social-safe'); ?></p>
    <div class="st-center">
        <div class='st-tooltip'>  
            <span>?</span>
            <div class='content'>
                <b></b>
                <h3><?php echo (isset($melibu_plugin_get_social_privacy['info_title']) ? $melibu_plugin_get_social_privacy['info_title'] : __('Your Message', 'sharing-social-safe')); ?></h3>
                <p><?php echo (isset($melibu_plugin_get_social_privacy['info_text']) ? $melibu_plugin_get_social_privacy['info_text'] : __('Here appears after save your information to your users. (See preview)', 'sharing-social-safe')); ?></p>
            </div>
        </div>
    </div>
    <form method="post" action="options.php">
        <?php settings_fields('melibu_plugin_social_privacy'); ?>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <button type="submit" class="button-primary"><?php _e('Save', 'sharing-social-safe'); ?></button>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
        </div>  
        <h3><?php _e('Link', 'sharing-social-safe'); ?></h3>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h4><?php _e('Your Title', 'sharing-social-safe'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <p><?php _e('Title', 'sharing-social-safe'); ?>
                    <input type="text" name="melibu_plugin_get_social_privacy[info_title]" value="<?php echo (isset($melibu_plugin_get_social_privacy['info_title']) ? $melibu_plugin_get_social_privacy['info_title'] : ''); ?>" class="mb-l-form--input">
                </p>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h4><?php _e('Your Message', 'sharing-social-safe'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <p><?php _e('Text', 'sharing-social-safe'); ?>
                    <textarea name="melibu_plugin_get_social_privacy[info_text]" class="mb-l-form--textarea"><?php echo (isset($melibu_plugin_get_social_privacy['info_text']) ? $melibu_plugin_get_social_privacy['info_text'] : ''); ?></textarea>
                </p>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-4">
                <h4><?php _e('Your Link', 'sharing-social-safe'); ?></h4>
            </div>
            <div class="mb-l-form--body mb-st-grid-4">
                <p><?php _e('Link', 'sharing-social-safe'); ?>
                    <input type="text" name="melibu_plugin_get_social_privacy[info_link]" value="<?php echo (isset($melibu_plugin_get_social_privacy['info_link']) ? $melibu_plugin_get_social_privacy['info_link'] : ''); ?>" class="mb-l-form--input">
                </p>
            </div>
            <div class="mb-l-form--foot mb-st-grid-4">
            </div>
        </div>
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
        <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
    </form>
</div>
<!--PERMISSION END-->