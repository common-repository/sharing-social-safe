<?php
/**
 * MELIBU PLUGIN GOOGLE CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.6.0
 * 
 * https://dev.bitly.com/authentication.html
 */
if (!class_exists('MELIBU_PLUGIN_SSS_TWITTER')) {

    class MELIBU_PLUGIN_SSS_TWITTER {

        const APP_ID = '';
        const APP_SECRET = '';

        /**
         * Login button
         * 
         */
        public function login() {

            ?>
            <div class="mb-sharing-social-safe">
                <div class="mb-plugin-sss-login-button">
                    <a href="#" class="twitters">
                        <i class="fa fa-twitter"></i> <?php _e('Connect with Twitter', 'sharing-social-safe'); ?>
                    </a>
                </div>
            </div>
            <?php
        }

        /**
         * link lookup
         * 
         * http://dev.bitly.com/links.html#v3_user_link_lookup
         * 
         * @param type $url
         * @return type
         */
        public function callback() {

            $fb = new Facebook\Facebook([
                'app_id' => '{app-id}', // Replace {app-id} with your app id
                'app_secret' => '{app-secret}',
                'default_graph_version' => 'v2.2',
            ]);

            $helper = $fb->getRedirectLoginHelper();

            try {
                $accessToken = $helper->getAccessToken();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            if (!isset($accessToken)) {
                if ($helper->getError()) {
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Error: " . $helper->getError() . "\n";
                    echo "Error Code: " . $helper->getErrorCode() . "\n";
                    echo "Error Reason: " . $helper->getErrorReason() . "\n";
                    echo "Error Description: " . $helper->getErrorDescription() . "\n";
                } else {
                    header('HTTP/1.0 400 Bad Request');
                    echo 'Bad request';
                }
                exit;
            }

            // Logged in
            echo '<h3>Access Token</h3>';
//            var_dump($accessToken->getValue());

            // The OAuth 2.0 client handler helps us manage access tokens
            $oAuth2Client = $fb->getOAuth2Client();

            // Get the access token metadata from /debug_token
            $tokenMetadata = $oAuth2Client->debugToken($accessToken);
            echo '<h3>Metadata</h3>';
//            var_dump($tokenMetadata);

            // Validation (these will throw FacebookSDKException's when they fail)
            $tokenMetadata->validateAppId('app-id'); // Replace {app-id} with your app id
            // If you know the user ID this access token belongs to, you can validate it here
            //$tokenMetadata->validateUserId('123');
            $tokenMetadata->validateExpiration();

            if (!$accessToken->isLongLived()) {
                // Exchanges a short-lived access token for a long-lived one
                try {
                    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
                } catch (Facebook\Exceptions\FacebookSDKException $e) {
                    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                    exit;
                }

                echo '<h3>Long-lived</h3>';
//                var_dump($accessToken->getValue());
            }

            $_SESSION['fb_access_token'] = (string) $accessToken;

            // User is logged in with a long-lived access token.
            // You can redirect them to a members-only page.
            //header('Location: https://example.com/members.php');
        }

    }

    global $melibuPluginSSStwitter;
    $melibuPluginSSStwitter = new MELIBU_PLUGIN_SSS_TWITTER();
}
