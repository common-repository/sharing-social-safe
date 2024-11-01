<div class="mb-plugin-sss-bitly-oauth">
    <div class="mb-plugin-sss-bitly-oauth-dialog">
        <div class="mb-plugin-sss-bitly-oauth-header">
            <h3><a title="By Force92i (Own work) [Public domain], via Wikimedia Commons" href="https://commons.wikimedia.org/wiki/File%3ABit.ly_Logo.png"><img width="46" alt="Bit.ly Logo" src="https://upload.wikimedia.org/wikipedia/commons/4/46/Bit.ly_Logo.png"/></a> OAuth</h3>
        </div>
        <input type="hidden" name="oauth" value="1" />
        <div class="mb-plugin-sss-bitly-oauth-body">
            <p>OAuth 2.0 is a simple and secure authentication mechanism.</p>
            <p><small>If you already have a bitly account, you can get your access here.</small></p>
            <div class="mb-plugin-sss-bitly-oauth-load"></div>
            <div class="mb-plugin-sss-bitly-oauth-errors"></div>
            <p>
                <label for="mb_plugin_get_social_bitly_login"><?php _e('Username', 'sharing-social-safe'); ?></label>
                <input type="text" 
                       name="mb-plugin-sss-bitly-oauth-username" 
                       id="mb_plugin_get_social_bitly_login" 
                       class="mb-input" />
                <br />
                <label for="mb_plugin_get_social_bitly_password"><?php _e('Password', 'sharing-social-safe'); ?></label>
                <input type="password" 
                       name="mb-plugin-sss-bitly-oauth-password" 
                       id="mb_plugin_get_social_bitly_password" 
                       class="mb-input" />
            </p>
            <p><small>You do not have an account on bitly, then you first have to create an account on <a href="https://app.bitly.com" target="_blank">bitly</a>.</small></p>
        </div>
        <div class="mb-plugin-sss-bitly-oauth-footer">
            <!--<a class="mb-plugin-sss-bitly-oauth-submit"><?php // _e('Get access', 'sharing-social-safe');  ?></a>-->
            <input type="submit" 
                   value="<?php _e('Get access', 'sharing-social-safe'); ?>" 
                   class="button-primary mb-plugin-sss-bitly-oauth-submit" />
            <a class="mb-plugin-sss-bitly-oauth-abort"><?php _e('Cancel', 'sharing-social-safe'); ?></a>
        </div>
    </div>
</div>
