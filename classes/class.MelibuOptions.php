<?php

/**
 * MELIBU PLUGIN OPTION CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.6.0
 */
if (!class_exists('MELIBU_PLUGIN_OPTIONS_02')) {

    class MELIBU_PLUGIN_OPTIONS_02 {

        public function bitly() {

            $collector = array();
            $melibu_plugin_get_social_bitly_oauth_name = get_option('melibu_plugin_get_social_bitly_oauth_name');
            $collector['login'] = '';
            if (isset($melibu_plugin_get_social_bitly_oauth_name) && !empty($melibu_plugin_get_social_bitly_oauth_name)) {
                $collector['login'] = $melibu_plugin_get_social_bitly_oauth_name;
            }
            $melibu_plugin_get_social_bitly_oauth = get_option('melibu_plugin_get_social_bitly_oauth');
            $collector['access_token'] = '';
            if (isset($melibu_plugin_get_social_bitly_oauth) && !empty($melibu_plugin_get_social_bitly_oauth)) {
                $collector['access_token'] = $melibu_plugin_get_social_bitly_oauth;
            }
            $melibu_plugin_get_social_bitly = get_option('melibu_plugin_get_social_bitly');
            $collector['onoff'] = '';
            if (isset($melibu_plugin_get_social_bitly['onoff']) && !empty($melibu_plugin_get_social_bitly['onoff'])) {
                $collector['onoff'] = $melibu_plugin_get_social_bitly['onoff'];
            }
            return $collector;
        }

        public function facebook() {

            $collector = array();
            $melibu_plugin_get_social_facebook = get_option('melibu_plugin_get_social_facebook');
            $collector['onoff'] = '';
            if (isset($melibu_plugin_get_social_facebook['onoff']) && !empty($melibu_plugin_get_social_facebook['onoff'])) {
                $collector['onoff'] = $melibu_plugin_get_social_facebook['onoff'];
            }
            $melibu_plugin_get_social_facebook_oauth_name = get_option('melibu_plugin_get_social_facebook_oauth_name');
            $collector['login'] = '';
            if (isset($melibu_plugin_get_social_facebook_oauth_name) && !empty($melibu_plugin_get_social_facebook_oauth_name)) {
                $collector['login'] = $melibu_plugin_get_social_facebook_oauth_name;
            }
            $melibu_plugin_get_social_facebook_oauth = get_option('melibu_plugin_get_social_facebook_oauth');
            $collector['access_token'] = '';
            if (isset($melibu_plugin_get_social_facebook_oauth) && !empty($melibu_plugin_get_social_facebook_oauth)) {
                $collector['access_token'] = $melibu_plugin_get_social_facebook_oauth;
            }
            return $collector;
        }

        public function google() {

            $collector = array();
            $melibu_plugin_get_social_google = get_option('melibu_plugin_get_social_google');
            $collector['onoff'] = '';
            if (isset($melibu_plugin_get_social_google['onoff']) && !empty($melibu_plugin_get_social_google['onoff'])) {
                $collector['onoff'] = $melibu_plugin_get_social_google['onoff'];
            }
            $melibu_plugin_get_social_google_oauth_name = get_option('melibu_plugin_get_social_google_oauth_name');
            $collector['login'] = '';
            if (isset($melibu_plugin_get_social_google_oauth_name) && !empty($melibu_plugin_get_social_google_oauth_name)) {
                $collector['login'] = $melibu_plugin_get_social_google_oauth_name;
            }
            $melibu_plugin_get_social_google_oauth = get_option('melibu_plugin_get_social_google_oauth');
            $collector['access_token'] = '';
            if (isset($melibu_plugin_get_social_google_oauth) && !empty($melibu_plugin_get_social_google_oauth)) {
                $collector['access_token'] = $melibu_plugin_get_social_google_oauth;
            }
            return $collector;
        }

        public function twitter() {

            $collector = array();
            $melibu_plugin_get_social_twitter = get_option('melibu_plugin_get_social_twitter');
            $collector['onoff'] = '';
            if (isset($melibu_plugin_get_social_twitter['onoff']) && !empty($melibu_plugin_get_social_twitter['onoff'])) {
                $collector['onoff'] = $melibu_plugin_get_social_twitter['onoff'];
            }
            $melibu_plugin_get_social_twitter_oauth_name = get_option('melibu_plugin_get_social_twitter_oauth_name');
            $collector['login'] = '';
            if (isset($melibu_plugin_get_social_twitter_oauth_name) && !empty($melibu_plugin_get_social_twitter_oauth_name)) {
                $collector['login'] = $melibu_plugin_get_social_twitter_oauth_name;
            }
            $melibu_plugin_get_social_twitter_oauth = get_option('melibu_plugin_get_social_twitter_oauth');
            $collector['access_token'] = '';
            if (isset($melibu_plugin_get_social_twitter_oauth) && !empty($melibu_plugin_get_social_twitter_oauth)) {
                $collector['access_token'] = $melibu_plugin_get_social_twitter_oauth;
            }
            return $collector;
        }

        public function settings() {

            $collector = array();
            $melibu_plugin_get_social_share = get_option('melibu_plugin_get_social_share');
            $collector['contentbefore'] = 'off';
            if (isset($melibu_plugin_get_social_share['contentbefore']) && !empty($melibu_plugin_get_social_share['contentbefore'])) {
                $collector['contentbefore'] = $melibu_plugin_get_social_share['contentbefore'];
            }
            $collector['contentafter'] = 'off';
            if (isset($melibu_plugin_get_social_share['contentafter']) && !empty($melibu_plugin_get_social_share['contentafter'])) {
                $collector['contentafter'] = $melibu_plugin_get_social_share['contentafter'];
            }
            return $collector;
        }

        public function design() {

            $collector = array();
            return $collector;
        }

        public function modal() {

            $collector = array();
            return $collector;
        }

        /**
         * 
         * @param array $args
         */
        public function post_types($opt = false) {

            $args = array(
                'public' => true,
            );
            $check = array();

            $output = 'names'; // names or objects, note names is the default
            $operator = 'and'; // 'and' or 'or'
            $post_types = get_post_types($args, $output, $operator);

            if (!empty($post_types)) {
                if ($opt === true) {
                    foreach ($post_types as $post_type) {
                        $check[$post_type] = "no";
                    }
                    return $check;
                } else {
                    return $post_types;
                }
            }
        }

        /**
         * 
         * @return type
         */
        public function defaults() {
            
            $args = array(
                'public' => true
            );
            $check = array();
            $output = 'names'; // names or objects, note names is the default
            $operator = 'and'; // 'and' or 'or'

            $post_types = get_post_types($args, $output, $operator);
            
            if ($post_types && !empty($post_types)) {
                foreach ($post_types as $post_type) {
                    $post_type = (string) $post_type;
                    if (! empty($post_type) && is_string($post_type)) {
                        $check[$post_type] = "allow";
                    }
                }
            }
            
            $mbPluginSSSdefaultOptions = array(
                // MODAL
                'modal' => '',
                'modal-wordpress' => 'wordpress',
                'modal-googleplus' => 'googleplus',
                'modal-facebook' => 'facebook',
                'modal-twitter' => 'twitter',
                'modal-xing' => 'xing',
                'modal-linkedin' => 'linkedin',
                'modal-tumblr' => 'tumblr',
                'modal-reddit' => 'reddit',
                'modal-digg' => 'digg',
                'modal-delicious' => 'delicious',
                'modal-stumbleupon' => 'stumbleupon',
                'modal-getpocket' => 'getpocket',
                'modal-pinterest' => 'pinterest',
                'modal-whatsapp' => 'whatsapp',
                'modal-mail' => 'mail',
                'modal-print' => 'print',
                //
                'bar-follow-or-share' => '',
                'bar-pos' => 'no',
                //
                'follow-user' => 'author',
                // CUSTOM
                'custom-css' => '',
            );
            $result = array_merge($mbPluginSSSdefaultOptions, $check);
            $mbPluginABoptions = wp_parse_args(get_option('mb-author-box-get-setting-group'), $result);
            return $mbPluginABoptions;
        }

        public function options() {

            global $wpdb;
            $mbPluginSSSoptions = $this->defaults();
            $melibu_sss = $wpdb->prefix . "melibu_sss";
            $get = $wpdb->get_results("SELECT * FROM " . $melibu_sss . " WHERE name='panel_options'");
            if (isset($get)) {
                if (isset($get[0]->value)) {
                    $data = unserialize($get[0]->value);
                    if (isset($data)) {
                        $mbPluginSSSoptions = $data;
                    }
                }
            }
            return $mbPluginSSSoptions;
        }

        public function check_plugin($pluginname) {

            // Collector
            $arr = array();

            // Check if get_plugins() function exists. This is required on the front end of the
            // site, since it is in a file that is normally only loaded in the admin.
            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            // Check if plugin installed
            $plugins = get_plugins();
            $arr['plugin-installed'] = false;
            foreach ($plugins as $pluginKey => $pluginValue) {
                if ($pluginname == $pluginKey) {
                    $arr['plugin-installed'] = true;
                }
            }

            // Check if plugin active
            if (is_plugin_active($pluginname)) {
                $arr['plugin-active'] = true;
            } else {
                $arr['plugin-active'] = false;
            }

            return $arr;
        }

    }

    global $MELIBU_PLUGIN_OPTIONS_02;
    $MELIBU_PLUGIN_OPTIONS_02 = new MELIBU_PLUGIN_OPTIONS_02();
}
