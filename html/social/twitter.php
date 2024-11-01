<?php
/**
 * Twitter
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
_e('Your Twitter via @username', 'sharing-social-safe');
?>
<br />
<input type="text" name="melibu_plugin_get_social_options[params_twitter_via]" value="<?php echo (isset($melibu_plugin_get_social_options['params_twitter_via']) ? $melibu_plugin_get_social_options['params_twitter_via'] : ''); ?>" class="mb-input" />
<p>
    <?php _e('Your username will be hung on the Share Button', 'sharing-social-safe'); ?><br />
    <small>
        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
        <a href="https://dev.twitter.com/web/tweet-button/web-intent/" target="_blank">Link</a>
    </small>
</p>