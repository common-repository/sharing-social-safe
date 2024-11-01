<?php
/**
 * YouTube
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
?>
<form method="post" 
      action="options.php">
          <?php settings_fields('sharing-social-safe'); ?>
    <p>
        <label><?php _e('Username', 'sharing-social-safe'); ?></label>
        <input type="text" 
               name="mb_plugin_get_social[youtube_user]" 
               value="<?php echo (isset($mb_plugin_get_social['youtube_user']) && $mb_plugin_get_social['youtube_user']!=''?$mb_plugin_get_social['youtube_user']:''); ?>"
               class="input" />
    </p>
    <p>
        <input type="submit" 
               value="<?php _e('Save', 'sharing-social-safe'); ?>" 
               class="button-primary" />
    </p>
    <?php wp_nonce_field('mb_plugin_social_nonce_action', 'mb_plugin_social_nonce'); ?>
</form>
