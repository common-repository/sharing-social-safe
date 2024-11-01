<?php
/**
 * MELIBU PLUGIN BITLY CLASS
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
if (!class_exists('MELIBU_PLUGIN_SSS_BITLY')) {

    class MELIBU_PLUGIN_SSS_BITLY {

        const BITLY_API = 'https://api-ssl.bitly.com/v3/';

        /**
         * Login button
         * 
         */
        public function login() {
            ?>
            <div class="mb-plugin-sss-login-button">
                <a href="#" class="mb-plugin-sss-bitly-oauth-button">
                    <span>
                        <img width="20" alt="Bit.ly Logo" src="https://upload.wikimedia.org/wikipedia/commons/4/46/Bit.ly_Logo.png"/>
                    </span> 
                    <?php _e('Connect with bitly', 'sharing-social-safe'); ?>
                </a>
            </div>
            <?php
        }

        /**
         * shorten
         * 
         * http://dev.bitly.com/links.html#v3_shorten
         * 
         * @param type $url
         * @param type $login
         * @param type $appkey
         * @param type $format
         * @return type
         */
        public function shorten($url) {

            global $MELIBU_PLUGIN_OPTIONS_02;
            $bitly = $MELIBU_PLUGIN_OPTIONS_02->bitly();
            $return = $url;
            if ('on' == $bitly['onoff']) {
                $newurl = trim(urlencode($url));
                $connectURL = self::BITLY_API . 'shorten?access_token=' . $bitly['access_token'] . '&longUrl=' . $newurl . '&format=json';
                $datas = json_decode($this->curl_get($connectURL, $newurl));
                if (isset($datas->status_code) && $datas->status_code == 200) {
                    $return = $datas->data->url;
                }
            }

            return $return;
        }

        /**
         * link lookup
         * 
         * http://dev.bitly.com/links.html#v3_user_link_lookup
         * 
         * @param type $url
         * @return type
         */
        public function user_link_lookup($url) {

            global $MELIBU_PLUGIN_OPTIONS_02;
            $bitly = $MELIBU_PLUGIN_OPTIONS_02->bitly();
            $arr = array();
            $arr['bitly_perma'] = $url;
            $newurl = trim(urlencode($url));
            $connectURL = self::BITLY_API . 'user/link_lookup?url=' . $newurl . '&access_token=' . $bitly['access_token'] . '&format=json';
            $arr['bitly_full'] = json_decode($this->curl_get($connectURL, $newurl));
            if (isset($arr['bitly_full']->status_code) && 200 == $arr['bitly_full']->status_code) {
                if (isset($arr['bitly_full']->data->link_lookup[0]->link)) {
                    $arr['bitly_link'] = $arr['bitly_full']->data->link_lookup[0]->link;
                }
                $arr['bitly_perma'] = $arr['bitly_full']->data->link_lookup[0]->url;
            }
            return $arr;
        }

        /**
         * curl GET
         * 
         * @param type $url
         * @param type $fallback
         * @return type
         */
        private function curl_get($url, $fallback) {

            try {
                $ch = curl_init(); // create curl resource 
                curl_setopt($ch, CURLOPT_URL, $url); // set url 
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 4);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return the transfer as a string 
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                $output = curl_exec($ch); // $output contains the output string
                $return = $output;
            } catch (Exception $e) {
                try {
                    $return = file_get_contents($url);
                } catch (Exception $e) {
                    $return = $fallback;
                    trigger_error('Error: ' . $e->getMessage(), E_USER_WARNING);
                }
                trigger_error('Curl error: ' . curl_error($ch) . ' Message: ' . $e->getMessage(), E_USER_WARNING);
            }
            curl_close($ch); // close curl resource to free up system resources 
            return $return;
        }

        /**
         * curl POST
         * 
         * @param type $url
         * @param type $params
         * @param type $header_array
         * @return type
         */
        public function curl_post($url, array $params) {

            $return = '';

            $fields = "";
            foreach ($params as $key => $value) {
                $fields .= $key . '=' . $value . '&';
            }

            trim($fields, '&');

            try {
                $ch = curl_init(); // create curl resource 
                curl_setopt($ch, CURLOPT_URL, $url); // set url 
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 2);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return the transfer as a string 
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_POST, count($params));
                curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                $output = curl_exec($ch); // $output contains the output string
                $return = $output;
            } catch (Exception $e) {
                $return = file_get_contents($url);
                trigger_error('Curl error: ' . curl_error($ch) . ' Message: ' . $e->getMessage(), E_USER_WARNING);
            }
            curl_close($ch); // close curl resource to free up system resources 

            $decoded_output = json_decode($return, 1);

            update_option('melibu_plugin_get_social_bitly_oauth_name', $decoded_output['username']);
            update_option('melibu_plugin_get_social_bitly_oauth', $decoded_output['access_token']);

            return $return;
        }

    }

    global $melibuPluginSSSBitly;
    $melibuPluginSSSBitly = new MELIBU_PLUGIN_SSS_BITLY();
}
