<?php
/**
 * Facebook
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
_e('Your quote the Post', 'sharing-social-safe');
?>
<br />
<input type="text" name="melibu_plugin_get_social_options[params_facebook_quote]" value="<?php echo (isset($melibu_plugin_get_social_options['params_facebook_quote']) ? $melibu_plugin_get_social_options['params_facebook_quote'] : ''); ?>" class="mb-input" />
<p>
    <?php _e('A quote to be shared along with the link', 'sharing-social-safe'); ?><br />
    <small>
        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
        <a href="https://developers.facebook.com/docs/sharing/reference/share-dialog/#params_share" target="_blank">Link</a>
    </small>
</p>