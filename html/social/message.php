<?php
/**
 * Privacy
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
$melibu_plugin_get_social_privacy = get_option('melibu_plugin_get_social_privacy');
?>
<table class="wp-list-table widefat fixed striped media">
    <tr>
        <th><?php _e('Description', 'sharing-social-safe'); ?></th>
        <th><?php _e('Basic', 'sharing-social-safe'); ?></th>
    </tr>
    <tr>
        <td>
            <h3><span class="dashicons dashicons-media-spreadsheet"></span> <?php _e('Privacy defaults', 'sharing-social-safe'); ?></h3>
            <p><?php _e('Your Information to the Users', 'sharing-social-safe'); ?></p>
            <div class="st-center">
                <div class='st-tooltip'>  
                    <span>?</span>
                    <div class='content'>
                        <b></b>
                        <h3><?php _e('Your Message', 'sharing-social-safe'); ?></h3>
                        <p><?php _e('Here appears after save your information to your users. (See preview)', 'sharing-social-safe'); ?></p>
                    </div>
                </div>
            </div>
            <p><?php _e('This information is shown with a small round question mark next to your part buttons, so you can inform each user immediately about the part of the left.', 'sharing-social-safe'); ?></p>
        </td>
        <td>
            <form method="post" action="options.php">
                <?php settings_fields('melibu_plugin_social_privacy'); ?>
                <p><?php _e('Title', 'sharing-social-safe'); ?>
                    <input type="text" name="melibu_plugin_get_social_privacy[info_title]" value="<?php echo (isset($melibu_plugin_get_social_privacy['info_title']) ? $melibu_plugin_get_social_privacy['info_title'] : ''); ?>" class="mb-input" />
                </p>
                <p><?php _e('Text', 'sharing-social-safe'); ?>
                    <textarea name="melibu_plugin_get_social_privacy[info_text]" class="mb-textarea"><?php echo (isset($melibu_plugin_get_social_privacy['info_text']) ? $melibu_plugin_get_social_privacy['info_text'] : ''); ?></textarea>
                </p>
                <p><?php _e('Link', 'sharing-social-safe'); ?>
                    <input type="text" name="melibu_plugin_get_social_privacy[info_link]" value="<?php echo (isset($melibu_plugin_get_social_privacy['info_link']) ? $melibu_plugin_get_social_privacy['info_link'] : ''); ?>" class="mb-input" />
                </p>
                <p>
                    <input type="submit" 
                           value="<?php _e('Save', 'sharing-social-safe'); ?>" 
                           class="button-primary" />
                </p>
                <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
            </form>
        </td>
    </tr>
</table>
