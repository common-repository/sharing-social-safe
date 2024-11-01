<?php
/**
 * Dummys follow
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
$social_media = array(
    array('class' => 'facebooks', 'icon' => 'fa fa-facebook-square', 'title' => 'Facebook'),
    array('class' => 'googlepluss', 'icon' => 'fa fa-google-plus-square', 'title' => 'Google Plus'),
    array('class' => 'twitters', 'icon' => 'fa fa-twitter-square', 'title' => 'Twitter'),
    array('class' => 'flickrs', 'icon' => 'fa fa-flickr', 'title' => 'Flickr'),
    array('class' => 'pinterests', 'icon' => 'fa fa-pinterest-square', 'title' => 'Pinterest'),
    array('class' => 'youtubes', 'icon' => 'fa fa-youtube-square', 'title' => 'YouTube'),
    array('class' => 'githubs', 'icon' => 'fa fa-github-square', 'title' => 'GitHub'),
    array('class' => 'tumblrs', 'icon' => 'fa fa-tumblr-square', 'title' => 'Tumblr'),
    array('class' => 'soundclouds', 'icon' => 'fa fa-soundcloud', 'title' => 'Soundcloud'),
    array('class' => 'skypes', 'icon' => 'fa fa-skype', 'title' => 'Skype'),
    array('class' => 'xings', 'icon' => 'fa fa-xing-square', 'title' => 'Xing'),
    array('class' => 'instagrams', 'icon' => 'fa fa-instagram', 'title' => 'Instagram'),
    array('class' => 'whatsapps', 'icon' => 'fa fa-whatsapp', 'title' => 'WhatsApp'),
    array('class' => 'jsfiddles', 'icon' => 'fa fa-jsfiddle', 'title' => 'JS Fiddle'),
    array('class' => 'snapchats', 'icon' => 'fa fa-snapchat-square', 'title' => 'Snap Chat'),
    array('class' => 'linkedins', 'icon' => 'fa fa-linkedin-square', 'title' => 'LinkedIn'),
    array('class' => 'rsss', 'icon' => 'fa fa-rss-square', 'title' => 'RSS')
);
?>
<p>
    <?php _e('This is the Follow short code. Please fill first your contact info to use Follow short code', 'sharing-social-safe'); ?> <a href="profile.php"><?php _e('Contact Info', 'sharing-social-safe'); ?></a>
</p>
<div class="st_group">
    <input type="text" value="[wp_mb_plugin_social follow='facebook,googleplus,twitter,flickr,pinterest,youtube,github,skype,snapchat,jsfiddle,instagram,soundcloud,xing,linkedin,tumblr']" readonly="readonly" class="regular-text" ondblclick="this.setSelectionRange(0, this.value.length)" />
    <div class='st-tooltip'>
        <span>?</span>
        <div class='content'>
            <b></b>
            <h3><?php _e('Short code', 'sharing-social-safe'); ?></h3>
            <p><?php _e('That is the short code. You can use a short code on a page, a post or place them in a widget. Or you can use the short code that is integrated into your editor, just click and the short code is placed. You can copy the short code editing and double click with.', 'sharing-social-safe'); ?></p>
            <small><?php _e('Please take the short code to copy', 'sharing-social-safe'); ?></small>
        </div>
    </div>
</div>
<div class="mb-sharing-social-safe">
    <div class="<?php echo $melibu_social_check_set; ?>">
        <?php
        foreach ($social_media as $key => $value) {
            ?>
            <a href="#" target="_blank" rel="popup" class="melibu-share-button <?php echo $value['class']; ?>">
                <span class="melibu-share-button__inner">
                    <span class="melibu-share-button__shine"></span>
                    <span class="melibu-share-button__icon">
                        <i class="<?php echo $value['icon']; ?>" aria-hidden="true"></i>
                    </span>
                    <span class="melibu-share-button__count">0</span>
                </span>
                <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
            </a>
            <?php
        }
        ?>
        <div class="st-clear"></div>
    </div>

    <div class="st-social-copy">
        Powerd by &copy; <a href="http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe/" target="_blank">Melibu</a>
    </div>
</div>
