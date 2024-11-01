<?php
/**
 * OPTIONALS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
$melibu_plugin_get_social_options = get_option('melibu_plugin_get_social_options');
?>
<h3>
    <?php _e('Information about the used part Buttons and Optional Parameters', 'sharing-social-safe'); ?>
</h3>
<form method="post" action="options.php">
    <?php settings_fields('melibu_plugin_social_options'); ?>
    <table class="wp-list-table widefat fixed striped media">
        <tr>
            <th><?php _e('Plattform', 'sharing-social-safe'); ?></th>
            <th><?php _e('Used Parameters', 'sharing-social-safe'); ?></th>
        </tr>
        <tr>
            <td><h3><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</h3></td>
            <td>
                <?php _e('Your Twitter via @username', 'sharing-social-safe'); ?>
                <br />
                <input type="text" name="melibu_plugin_get_social_options[params_twitter_via]" value="<?php echo (isset($melibu_plugin_get_social_options['params_twitter_via']) ? $melibu_plugin_get_social_options['params_twitter_via'] : ''); ?>" class="mb-input" />
                <p>
                    <?php _e('Your username will be hung on the Share Button', 'sharing-social-safe'); ?><br />
                    <small>
                        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                        <a href="https://dev.twitter.com/web/tweet-button/web-intent/" target="_blank">Link</a>
                    </small>
                </p>
                <p>
                    url, text, via
                </p>
            </td>
        </tr>
        <tr>
            <td><h3><i class="fa fa-xing" aria-hidden="true"></i> Xing</h3></td>
            <td>
                <?php _e('Your Xing follow Page', 'sharing-social-safe'); ?>
                <br />
                <input type="text" name="melibu_plugin_get_social_options[params_xing_follow]" value="<?php echo (isset($melibu_plugin_get_social_options['params_xing_follow']) ? $melibu_plugin_get_social_options['params_xing_follow'] : ''); ?>" class="mb-input" />
                <p>
                    <?php _e('You can place a Follow plugin on the success page displayed after a successful share', 'sharing-social-safe'); ?><br />
                    <small>
                        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                        <a href="https://dev.xing.com/plugins/share_button/docs/#custom-design" target="_blank">Link</a>
                    </small>
                </p>
                <p>
                    url, follow_url
                </p>
            </td>
        </tr>
        <tr>
            <td><h3><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</h3></td>
            <td>
                <?php _e('Your quote the Post', 'sharing-social-safe'); ?>
                <br />
                <input type="text" name="melibu_plugin_get_social_options[params_facebook_quote]" value="<?php echo (isset($melibu_plugin_get_social_options['params_facebook_quote']) ? $melibu_plugin_get_social_options['params_facebook_quote'] : ''); ?>" class="mb-input" />
                <p>
                    <?php _e('A quote to be shared along with the link', 'sharing-social-safe'); ?><br />
                    <small>
                        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                        <a href="https://developers.facebook.com/docs/sharing/reference/share-dialog/#params_share" target="_blank">Link</a>
                    </small>
                </p>
                <p>url, title, quote</p>
            </td>
        </tr>
        <tr>
            <td><h3><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp</h3></td>
            <td>
                <p>abid=256, text</p>
                <p>
                    <small>
                        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                        <a href="https://www.whatsapp.com/faq/de/android/28000012" target="_blank">Link</a>
                    </small>
                </p>
            </td>
        </tr>
        <tr>
            <td><h3><i class="fa fa-google" aria-hidden="true"></i> Google+</h3></td>
            <td>
                <p>
                    url, hl
                </p>
                <p>
                    <small>
                        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                        <a href="https://developers.google.com/+/web/share/#share-link" target="_blank">Link</a>
                    </small>
                </p>
            </td>
        </tr>
        <tr>
            <td><h3><i class="fa fa-tumblr" aria-hidden="true"></i> tumblr</h3></td>
            <td>
                <p>
                    url, title, content
                </p>
                <p>
                    <small>
                        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                        <a href="https://www.tumblr.com/docs/de/share_button#custom-button" target="_blank">Link</a>
                    </small>
                </p>
            </td>
        </tr>
        <tr>
            <td><h3><i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn</h3></td>
            <td>
                <p>
                    url, mini, title
                </p>
                <p>
                    <small>
                        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                        <a href="https://developer.linkedin.com/docs/share-on-linkedin" target="_blank">Link</a>
                    </small>
                </p>
            </td>
        </tr>
        <tr>
            <td><h3><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</h3></td>
            <td>
                <p>
                    url, media, description
                </p>
                <p>
                    <small>
                        <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                        <a href="https://developers.pinterest.com/docs/widgets/pin-it/" target="_blank">Link</a>
                    </small>
                </p>
            </td>
        </tr>
    </table>
    <p>
        <input type="submit" 
               value="<?php _e('Save', 'sharing-social-safe'); ?>" 
               class="button-primary" />
    </p>
    <?php wp_nonce_field('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce'); ?>
</form>
