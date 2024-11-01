<?php
/**
 * Xing
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
_e('Your Xing follow Page', 'sharing-social-safe');
?>
<br />
<input type="text" name="melibu_plugin_get_social_options[params_xing_follow]" value="<?php echo (isset($melibu_plugin_get_social_options['params_xing_follow']) ? $melibu_plugin_get_social_options['params_xing_follow'] : ''); ?>" class="mb-input" />
<p>
    <?php _e('You can place a Follow plugin on the success page displayed after a successful share', 'sharing-social-safe'); ?><br />
    <small>
        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
        <a href="https://dev.xing.com/plugins/share_button/docs/#custom-design" target="_blank">Link</a>
    </small>
</p>