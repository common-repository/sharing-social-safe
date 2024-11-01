<?php
/**
 * Dummy share
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
?>
<p>
    <?php _e('When parts need to configure anything, unless you use the optional parameters, otherwise you can use immediately on the MeliBu widget or via short code.', 'sharing-social-safe'); ?>
</p>
<div class="st_group">
    <input type="text" value="[wp_mb_plugin_social share='wordpress,googleplus,facebook,twitter,xing,linkedin,tumblr,reddit,digg,delicious,stumbleupon,getpocket,pinterest,whatsapp,mail,print']" readonly="readonly" class="regular-text" ondblclick="this.setSelectionRange(0, this.value.length)"/>
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
        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> wordpress" class="melibu-share-button wordpresss slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-wordpress"></i>
                </span> 
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Google+" class="melibu-share-button googlepluss slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-google-plus"></i>
                </span> 
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Facebook" class="melibu-share-button facebooks slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-facebook"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Twitter" class="melibu-share-button twitters slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-twitter"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Xing" class="melibu-share-button xings slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-xing"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> LinkedIn" class="melibu-share-button linkedins slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-linkedin"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> tumblr" class="melibu-share-button tumblrs slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-tumblr"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> reddit" class="melibu-share-button reddits slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-reddit"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> digg" class="melibu-share-button diggs slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-digg"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> delicious" class="melibu-share-button deliciouss slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-delicious"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> stumbleupon" class="melibu-share-button stumbleupons slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-stumbleupon"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> getpocket" class="melibu-share-button getpockets slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-get-pocket"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Pinterest" class="melibu-share-button pinterests slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-pinterest-p"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> WhatsApp" class="melibu-share-button whatsapps slide" style="display:inline-block;">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-whatsapp"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span>
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on Mail', 'sharing-social-safe'); ?>" class="melibu-share-button mailits slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <a href="#" rel="popup" title="<?php _e('Share on Print', 'sharing-social-safe'); ?>" class="melibu-share-button prints slide">
            <span class="melibu-share-button__inner">
                <span class="melibu-share-button__shine"></span>
                <span class="melibu-share-button__icon">
                    <i class="fa fa-print"></i>
                </span>
                <span class="melibu-share-button__count">0</span>
            </span> 
            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
        </a>

        <?php
        $melibu_plugin_get_social_privacy_opt = get_option('melibu_plugin_get_social_privacy_opt');
        if (isset($melibu_plugin_get_social_privacy_opt['onoff']) && $melibu_plugin_get_social_privacy_opt['onoff'] == 'on') {
            ?>
            <div class="st-tooltip">
                <span>?</span>
                <div class='content'>
                    <b></b>
                    <h3><?php _e((isset($melibu_plugin_get_social_privacy['info_title']) ? $melibu_plugin_get_social_privacy['info_title'] : ''), 'sharing-social-safe'); ?></h3>
                    <p><?php _e((isset($melibu_plugin_get_social_privacy['info_text']) ? $melibu_plugin_get_social_privacy['info_text'] : ''), 'sharing-social-safe'); ?></p>
                </div>
            </div>
        <?php } ?>
        <div class="st-clear"></div>
    </div>

    <div class="st-social-copy">
        Powerd by &copy; <a href="http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe/" target="_blank">Melibu</a>
    </div>
</div>