<!--TABS START-->
<div class="mb-l-tabs">
    <?php
    $melibu_plugin_get_social_options = get_option('melibu_plugin_get_social_options');
    ?>
    <h2><?php _e('Optional', 'sharing-social-safe'); ?></h2>
    <p><?php _e('Globally set which social optional you want to use on the buttons', 'sharing-social-safe'); ?>.</p>
    <form method="post" action="options.php">
        <?php settings_fields('melibu_plugin_social_options'); ?>

        <h3><?php _e('Used Parameters', 'sharing-social-safe'); ?></h3>
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
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Your Twitter via @username', 'sharing-social-safe'); ?></h4>
                <small>
                    <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                    <a href="https://dev.twitter.com/web/tweet-button/web-intent/" target="_blank">Link</a>
                </small>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <i class="fa fa-twitter" aria-hidden="true"></i> Twitter
                <input type="text" name="melibu_plugin_get_social_options[params_twitter_via]" value="<?php echo (isset($melibu_plugin_get_social_options['params_twitter_via']) ? $melibu_plugin_get_social_options['params_twitter_via'] : ''); ?>" class="mb-l-form--input" />
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <p><?php _e('Your username will be hung on the Share Button', 'sharing-social-safe'); ?></p>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <p> url, text, via</p>
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Your Xing follow Page', 'sharing-social-safe'); ?></h4>
                <small>
                    <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                    <a href="https://dev.xing.com/plugins/share_button/docs/#custom-design" target="_blank">Link</a>
                </small>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <i class="fa fa-xing" aria-hidden="true"></i> Xing
                <input type="text" name="melibu_plugin_get_social_options[params_xing_follow]" value="<?php echo (isset($melibu_plugin_get_social_options['params_xing_follow']) ? $melibu_plugin_get_social_options['params_xing_follow'] : ''); ?>" class="mb-l-form--input" />
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
                <p><?php _e('You can place a Follow plugin on the success page displayed after a successful share', 'sharing-social-safe'); ?></p>
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
                <p>url, follow_url</p>
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4><?php _e('Your quote the Post', 'sharing-social-safe'); ?></h4>
                <small>
                    <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                    <a href="https://developers.facebook.com/docs/sharing/reference/share-dialog/#params_share" target="_blank">Link</a>
                </small>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <i class="fa fa-facebook" aria-hidden="true"></i> Facebook
                <input type="text" name="melibu_plugin_get_social_options[params_facebook_quote]" value="<?php echo (isset($melibu_plugin_get_social_options['params_facebook_quote']) ? $melibu_plugin_get_social_options['params_facebook_quote'] : ''); ?>" class="mb-l-form--input" />
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
                <p><?php _e('A quote to be shared along with the link', 'sharing-social-safe'); ?></p>
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
                <p>url, title, quote</p>
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4>WhatsApp</h4>
                <small>
                    <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                    <a href="https://www.whatsapp.com/faq/de/android/28000012" target="_blank">Link</a>
                </small>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">

            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
                <p>abid=256, text</p>
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4>Google+</h4>
                <small>
                    <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                    <a href="https://developers.google.com/+/web/share/#share-link" target="_blank">Link</a>
                </small>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <i class="fa fa-google" aria-hidden="true"></i> Google+
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
                <p>url, hl</p>
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4>tumblr</h4>
                <small>
                    <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                    <a href="https://www.tumblr.com/docs/de/share_button#custom-button" target="_blank">Link</a>
                </small>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <i class="fa fa-tumblr" aria-hidden="true"></i> tumblr
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
                <p>url, title, content</p>
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4>LinkedIn</h4>
                <small>
                    <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                    <a href="https://developer.linkedin.com/docs/share-on-linkedin" target="_blank">Link</a>
                </small>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
                <p>url, mini, title</p>
            </div>
        </div>
        <div class="mb-l-form st-clear-after">
            <div class="mb-l-form--head mb-st-grid-3">
                <h4>Pinterest</h4>
                <small>
                    <?php _e('Want you more information', 'sharing-social-safe'); ?>:
                    <a href="https://developers.pinterest.com/docs/widgets/pin-it/" target="_blank">Link</a>
                </small>
            </div>
            <div class="mb-l-form--body mb-st-grid-3">
                <i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
            </div>
            <div class="mb-l-form--foot mb-st-grid-3">
                <p>url, media, description</p>
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
<!--TABS END-->