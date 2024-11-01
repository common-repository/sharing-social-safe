<?php
global $MELABU_PLUGIN_DATA_02;
?>
<div class="wrap">
    <div class="st-wp-brand">
        <h1>
            <img src="<?php echo plugins_url("sharing-social-safe/img/icon-MB.png"); ?>" alt="icon-MB-20" width="50" class="st-wp-logo"> 
            <?php echo $MELABU_PLUGIN_DATA_02['Name']; ?>
            <span><?php _e('Professional Themes and Plugins for WordPress', 'sharing-social-safe'); ?></span>
        </h1>
    </div>
    <hr />
    <div class="st-wp-brand-box">
        <p>
            <?php _e('Version', 'sharing-social-safe'); ?>: <?php echo get_option('melibu-plugin-social-version'); ?> | DB <?php _e('Version', 'sharing-social-safe'); ?>: <?php echo get_option('melibu-plugin-social-db-version'); ?>
            <span class="st-right" style="text-align: right;">
                <span class="dashicons dashicons-star-filled"></span> <a href="https://wordpress.org/support/plugin/sharing-social-safe/reviews/" target="_blank"><?php _e('Rate', 'sharing-social-safe'); ?></a> |
                <span class="dashicons dashicons-backup"></span> <a href="https://wordpress.org/plugins/sharing-social-safe/changelog/" target="_blank"><?php _e('Changelog', 'sharing-social-safe'); ?></a> | 
                <span class="dashicons dashicons-editor-help"></span> <a href="https://wordpress.org/plugins/sharing-social-safe/faq/" target="_blank"><?php _e('FAQ', 'sharing-social-safe'); ?></a> | 
                <span class="dashicons dashicons-sos"></span> <a href="https://wordpress.org/support/plugin/sharing-social-safe" target="_blank"><?php _e('Support', 'sharing-social-safe'); ?></a>
            </span>
        </p>
    </div>
    <hr />
    <div class="mb-st-grid-9">
        <div class="st-melibuPlugin-area">
            <div class="welcome-panel">

                <div class="welcome-panel-column-container">
                    <p class="about-description">
                        <?php _e('This documentation should help you', 'sharing-social-safe') . '.'; ?>
                    </p>
                    <br />

                    <div class="melibu-sss-docu">

                        <div class="left-side">
                            <ul>
                                <li class="start st-active">
                                    <div class="st-icon st-active">
                                        <span class="dashicons dashicons-dashboard"></span>
                                    </div>
                                    <?php _e('Start', 'sharing-social-safe'); ?>
                                </li>
                                <li class="part-1">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-admin-appearance"></span>
                                    </div>
                                    <?php _e('Design', 'sharing-social-safe'); ?>
                                </li>
                                <li class="part-2">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-share"></span>
                                    </div>
                                    <?php _e('Statistics', 'sharing-social-safe'); ?>
                                </li>
                                <li class="part-3">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-lock"></span>
                                    </div>
                                    <?php _e('Privacy', 'sharing-social-safe'); ?>
                                </li>
                                <li class="part-4">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-sos"></span>
                                    </div>
                                    <?php _e('Optional', 'sharing-social-safe'); ?>
                                </li>
                                <li class="part-5">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-admin-generic"></span>
                                    </div>
                                    <?php _e('Settings', 'sharing-social-safe'); ?>
                                </li>
                                <li class="part-6">
                                    <div class="st-icon">
                                        <span class="dashicons dashicons-editor-code"></span>
                                    </div>
                                    <?php _e('Short code', 'sharing-social-safe'); ?>
                                </li>
                            </ul>
                        </div>

                        <div class="border">
                            <div class="line one"></div>
                        </div>

                        <div class="right-side">

                            <div class="first active">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-dashboard"></span>
                                </div>
                                <h1><?php _e('To use Melibu WP Sharing Social Safe properly', 'sharing-social-safe'); ?></h1>
                                <h2><?php _e('Melibu WP Sharing Social Safe', 'sharing-social-safe'); ?></h2>
                                <p><?php _e('Thank you that you use MeliBu WP Sharing Social Safe', 'sharing-social-safe'); ?>.</p>
                                <p><?php _e('Protects you and access your users against unauthorized, it was specifically designed', 'sharing-social-safe'); ?>.</p>
                                <p><?php _e('We offer you a bitly interface to share your shared pages and posts faster than backlinks and get information, you can see how often the split link was clicked and much more', 'sharing-social-safe'); ?>.</p>
                                <img src="<?php echo plugins_url("screenshot-1.png", dirname(__FILE__)); ?>" alt="screenshot-1" width="650" class="st-img">
                            </div>

                            <div class="second">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-admin-appearance"></span>
                                </div>
                                <h1><?php _e("Let's start now with the button designs", 'sharing-social-safe'); ?></h1>
                                <h2><?php _e('Layout', 'sharing-social-safe'); ?></h2>
                                <p><?php _e('First you have the opportunity to select a predefined template, in the free version are these', 'sharing-social-safe'); ?>:</p>
                                <ul>
                                    <li><?php _e('MB One Button', 'sharing-social-safe'); ?></li>
                                    <li><?php _e('MB Glow', 'sharing-social-safe'); ?></li>
                                    <li><?php _e('MB Glow Dark', 'sharing-social-safe'); ?></li>
                                    <li><?php _e('MB Special Overlap', 'sharing-social-safe'); ?> I</li>
                                    <li><?php _e('MB Shining Dark Short', 'sharing-social-safe'); ?> II</li>
                                    <li><?php _e('MB Glow Semicircle', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Glow Circle', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat Smooth', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat Smooth Dark', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat Semicircle', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat Semicircle Smooth', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat Circle Smooth', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat Circle Switch', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat Long (Default)', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat Long Rotate Icon', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Long Rounded', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Shining Dark', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Shining Dark Line', 'sharing-social-safe'); ?> III</li>
                                    <li><?php _e('MB Flat Full Width', 'sharing-social-safe'); ?> III</li>
                                </ul>
                                <a href="admin.php?page=melibu-plugin-social-admin-control-menu-0" class="mb-btn"><?php _e('Select your social button', 'sharing-social-safe'); ?>!</a>
                            </div>

                            <div class="third">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-share"></span>
                                </div>
                                <h1><?php _e('Statistics', 'sharing-social-safe'); ?></h1>
                                <h2><?php _e('Share and Follow stats', 'sharing-social-safe'); ?></h2>
                                <img src="<?php echo plugins_url("screenshot-7.png", dirname(__FILE__)); ?>" alt="screenshot-7" width="650" class="st-img">
                                <p><?php _e('An overview with different data shared/followed and tracked events', 'sharing-social-safe'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-social-admin-control-menu-0" class="mb-btn"><?php _e('Set it', 'sharing-social-safe'); ?></a>
                            </div>

                            <div class="fourth">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-lock"></span>
                                </div>
                                <h1><?php _e('Privacy', 'sharing-social-safe'); ?></h1>
                                <p><?php _e('Share buttons prevent all automatically unauthorized access to your website, no third party data is transferred unless you clicked', 'sharing-social-safe'); ?>.</p>
                                <h2><?php _e('Refer to Privacy Policy', 'sharing-social-safe'); ?></h2>
                                <p><?php _e('The privacy box is only intended for information purposes to your users, if they so wish', 'sharing-social-safe'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-social-admin-control-menu-0" class="mb-btn"><?php _e('Privacy', 'sharing-social-safe'); ?></a>
                                <a href="admin.php?page=melibu-plugin-social-admin-control-menu-0" class="mb-btn"><?php _e('Settings', 'sharing-social-safe'); ?></a>
                            </div>

                            <div class="fifth">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-sos"></span>
                                </div>
                                <h1><?php _e('Optionals', 'sharing-social-safe'); ?></h1>
                                <h2><?php _e('Optional parameters', 'sharing-social-safe'); ?></h2>
                                <p><?php _e('These parameters are optional and do not have to be filled in, however, they can be used and serve as information purposes', 'sharing-social-safe'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-social-admin-control-menu-0" class="mb-btn"><?php _e('Optionals', 'sharing-social-safe'); ?></a>
                            </div>

                            <div class="sixth">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-admin-generic"></span>
                                </div>
                                <h1><?php _e('Settings', 'sharing-social-safe'); ?></h1>
                                <h2><?php _e('Show how often was shared', 'sharing-social-safe'); ?></h2>
                                <img src="<?php echo plugins_url("screenshot-4.png", dirname(__FILE__)); ?>" alt="screenshot-7" width="650" class="st-img"/>
                                <p><?php _e('Each link is counted automatically when it is clicked, so you can track everything and stay up-to-date', 'sharing-social-safe'); ?>.<br />
                                    <a href="admin.php?page=melibu-plugin-social-admin-control-menu-0" class="mb-btn"><?php _e('Activate it', 'sharing-social-safe'); ?></a>
                                </p>

                                <h2>bit.ly</h2>
                                <img src="<?php echo plugins_url("img/other/bitlyback.png", dirname(__FILE__)); ?>" alt="screenshot-7" width="650" class="st-img"/>
                                <p>
                                    <?php _e('And this is not enough, we offer bitly as an additional option. You can continue with bitly the split links still further and see thus statistics of the links which have landed on the social networks and be clicked. So he does not miss anything and you know about every link', 'sharing-social-safe'); ?>.<br />
                                    <a href="admin.php?page=melibu-plugin-social-admin-control-menu-0" class="mb-btn"><?php _e('Activate it', 'sharing-social-safe'); ?></a>
                                </p>
                                <p><?php _e('You can make and optimize with many various settings', 'sharing-social-safe'); ?>.</p>
                                <a href="admin.php?page=melibu-plugin-social-admin-control-menu-0" class="mb-btn"><?php _e('Set it', 'sharing-social-safe'); ?></a>
                            </div>

                            <div class="seventh">
                                <div class="st-icon st-big">
                                    <span class="dashicons dashicons-editor-code"></span>
                                </div>
                                <h1><?php _e('Short code', 'sharing-social-safe'); ?></h1>
                                <p><?php _e('Use the short code in your WP Editor for set your shares/follows or copy, paste and set manually', 'sharing-social-safe'); ?>.</p>
                                <div>
                                    <ul>
                                        <li>
                                            <strong>[wp_mb_plugin_social ...]</strong>: <br />
                                            <?php _e('Without this shortcode does not share or follow the old version should be replaced if possible by the latest. Both versions work but could be a fault occur when another plugin also the name download has a shortcode', 'sharing-social-safe'); ?>.
                                        </li>
                                        <li>
                                            <strong>share</strong> (old <strong>data</strong>): <br />
                                            <img src="<?php echo MELIBU_PLUGIN_URL_02 . 'screenshot-11.png'; ?>" alt="">
                                            <?php _e('With the share parameter you can specify which social networks are to be listed for tracking on the respective networks', 'sharing-social-safe'); ?>.
                                        </li>
                                        <li>
                                            <strong>follow</strong> (old <strong>find</strong>): <br />
                                            <img src="<?php echo MELIBU_PLUGIN_URL_02 . 'screenshot-12.png'; ?>" alt="">
                                            <?php _e('With the follow parameter, you can specify which social networks are listed for tracking on the respective networks', 'sharing-social-safe'); ?>.
                                        </li>
                                    </ul>
                                    <div class='st-melibuPlugin-area'>
                                        <div class="st-present">
                                            <label for='mb_plugin_sss_shortcode_share'>
                                                <small>
                                                    <?php _e('That is the SHARE short code. You can copy a short code and place on a page, post or in a widget. Or use the short code has been integrated into your editor, a click is enough and the part buttons after save visible', 'sharing-social-safe'); ?>.
                                                </small>
                                                <input type="text" value="[wp_mb_plugin_social share='wordpress,googleplus,facebook,twitter,xing,linkedin,tumblr,reddit,digg,delicious,stumbleupon,getpocket,pinterest,whatsapp,mail,print']" readonly="readonly" class="regular-text" id="mb_plugin_sss_shortcode_share" ondblclick="this.setSelectionRange(0, this.value.length)"/>
                                            </label><br />
                                            <small><?php _e('Please take the short code double click to copy', 'sharing-social-safe'); ?></small>
                                            <br /><br />
                                            <label for='mb_plugin_sss_shortcode_follow'>
                                                <small>
                                                    <?php _e('That is the FOLLOW short code. You can copy a short code and place on a page, post or in a widget. Or use the short code has been integrated into your editor, a click is enough and the part buttons after save visible', 'sharing-social-safe'); ?>.
                                                </small>
                                                <input type="text" value="[wp_mb_plugin_social follow='facebook,googleplus,twitter,flickr,pinterest,youtube,github,skype,snapchat,jsfiddle,instagram,soundcloud,xing,linkedin,tumblr']" readonly="readonly" class="regular-text" id="mb_plugin_sss_shortcode_follow" ondblclick="this.setSelectionRange(0, this.value.length)" />
                                            </label><br />
                                            <small><?php _e('Please take the short code double click to copy', 'sharing-social-safe'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="mb-st-grid-3">
        <div class="melibu-postbox postbox  st-margin-top-15">
            <h2><span><?php _e('Use Short code in WP Editor', 'sharing-social-safe'); ?></span></h2>
            <p><?php _e('Take your part to put the buttons shortcode in WP editor Melibu', 'sharing-social-safe'); ?>.</p>
        </div>
    </div>
    <div class="mb-st-grid-3">
        <div class="melibu-postbox postbox">
            <h2><span><?php _e('Use Follow Widget', 'sharing-social-safe'); ?></span></h2>
            <p><?php _e('Use the Social follow widget to close attention', 'sharing-social-safe'); ?></p>
        </div>
    </div>
</div>