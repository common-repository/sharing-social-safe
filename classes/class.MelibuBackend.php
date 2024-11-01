<?php
require_once 'class.MelibuBackendMenus.php';

if (!class_exists('MELIBU_PLUGIN_BACKEND_02')) {

    /**
     * Class
     */
    class MELIBU_PLUGIN_BACKEND_02 extends MELIBU_PLUGIN_BACKEND_02_MENUS {

        /**
         *  Construct
         */
        public function __construct() {

            /**
             * add_action() WP Since: 1.2.0
             * https://developer.wordpress.org/reference/functions/add_action/
             */
            add_action('admin_menu', array($this, 'admin_menu'));
            add_action('admin_init', array($this, 'admin_init'));
            add_action('admin_head', array($this, 'admin_head'));
            add_action('admin_notices', array($this, 'admin_notices'));
            add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
            add_action('admin_footer', array($this, 'admin_footer'));
            add_action('wp_ajax_melibu_sss_admin_ajax', array($this, 'melibu_sss_admin_ajax')); // admin side
            add_action('plugins_loaded', array($this, 'plugins_loaded'));
            add_action('plugins_loaded', array($this, 'plugins_loaded_about'), 1);
        }

        /**
         *  Activate
         */
        public static function activate() {

            /**
             * current_user_can() WP Since: 2.0.0
             * https://codex.wordpress.org/Function_Reference/current_user_can
             * https://codex.wordpress.org/Roles_and_Capabilities
             */
            if (!current_user_can('activate_plugins')) {
                return;
            }

            clearstatcache();
            flush_rewrite_rules(); // rewrite rules for activate and update
            wp_cache_flush();

            /**
             * set_transient() WP Since: 2.8
             * https://codex.wordpress.org/Function_Reference/set_transient
             */
            set_transient('melibu-plugin-social-page-activated', 1, 30);
        }

        /**
         *  Deactivate
         */
        public static function deactivate() {

            //..
        }

        /**
         * Uninstall
         */
        public static function uninstall() {

            /**
             * current_user_can() WP Since: 2.0.0
             * https://codex.wordpress.org/Function_Reference/current_user_can
             * https://codex.wordpress.org/Roles_and_Capabilities
             */
            if (!defined('WP_UNINSTALL_PLUGIN') && !current_user_can('delete_plugins')) {
                return;
            }

            /**
             * unregister_setting() Since: 2.7.0
             */
            unregister_setting("melibu_plugin_social", "melibu_plugin_get_social", "");
            unregister_setting("melibu_plugin_social_privacy", "melibu_plugin_get_social_privacy", "");
            unregister_setting("melibu_plugin_social_privacy_opt", "melibu_plugin_get_social_privacy_opt", "");
            unregister_setting("melibu_plugin_social_options", "melibu_plugin_get_social_options", "");
            unregister_setting("melibu_plugin_social_copy", "melibu_plugin_get_social_copy", "");
            unregister_setting("melibu_plugin_social_share", "melibu_plugin_get_social_share", "");
            unregister_setting("melibu_plugin_social_count", "melibu_plugin_get_social_count", "");
            unregister_setting("melibu_plugin_social_bitly", "melibu_plugin_get_social_bitly", "");

            /**
             * delete_option() Since: 1.2.0
             */
            delete_option("melibu_plugin_get_social");
            delete_option("melibu_plugin_get_social_privacy");
            delete_option("melibu_plugin_get_social_privacy_opt");
            delete_option("melibu_plugin_get_social_options");
            delete_option("melibu_plugin_get_social_copy");
            delete_option("melibu_plugin_get_social_share");
            delete_option("melibu_plugin_get_social_count");
            delete_option("melibu_plugin_get_social_bitly");
            delete_option("melibu_plugin_get_social_bitly_oauth");
            delete_option('melibu-plugin-social-version');
            delete_option('melibu-plugin-social-db-version');

            global $wpdb;
            $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}melibu_sss");
            $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}melibu_sss_s");
        }

        /**
         * Admin Init
         */
        public function admin_init() {

            $this->init_options(); // Option
            $this->init_settings(); // Einstellungen
            $this->init_filter(); // Filter

            global $wpdb;
            if (isset($_POST) && !empty($_POST['mb-social-get-setting-group'])) {
                if (!isset($_POST['mb-social-nonce']) || !wp_verify_nonce($_POST['mb-social-nonce'], 'mb-social-nonce-action')) {
                    //..
                } else {
                    $melibu_sss = $wpdb->prefix . "melibu_sss";
                    $get = $wpdb->get_results("SELECT * FROM " . $melibu_sss . "");
                    $dbTableName = 'panel_options';
                    $bodyguard = true;
                    if ($get) {
                        foreach ($get as $key => $data) {
                            if ($data->name == $dbTableName) {
                                $bodyguard = false;
                                $wpdb->update($melibu_sss, array(
                                    'name' => $dbTableName,
                                    'value' => serialize(esc_sql($_POST['mb-social-get-setting-group'])),
                                    'time' => time()
                                        ), array('id' => $data->id)
                                );
                            }
                        }
                    }
                    if ($bodyguard === true) {
                        $wpdb->insert($melibu_sss, array(
                            'name' => $dbTableName,
                            'value' => serialize(esc_sql($_POST['mb-social-get-setting-group'])),
                            'time' => time()
                        ));
                    }
                }
            }
        }

        /**
         * 
         */
        public function admin_notices() {
            
        }

        /**
         * 
         */
        public function admin_footer() {

            require_once MELIBU_PLUGIN_PATH_02 . 'tpl/oauth.php';
        }

        /**
         * Admin Head
         */
        public function admin_head() {

            /**
             * Get saved or default settings
             */
            global $MELIBU_PLUGIN_OPTIONS_02;
            $mbPluginSSSoptions = $MELIBU_PLUGIN_OPTIONS_02->options(); // Options
            // CUSTOM CSS
            $customCSS = isset($mbPluginSSSoptions['custom-css']) && !empty($mbPluginSSSoptions['custom-css']) ? $mbPluginSSSoptions['custom-css'] : '';
            if ($customCSS) {
                ?>
                <style type='text/css'>
                <?php echo $customCSS; ?>
                </style>
                <?php
            }
        }

        /**
         * Admin Head
         */
        public function admin_enqueue_scripts() {
            
            wp_enqueue_media();
            
            // CSS fontawesome
            $melibu_plugin_get_social = get_option('melibu_plugin_get_social');
            if (isset($melibu_plugin_get_social['fontawesome_onoff']) && $melibu_plugin_get_social['fontawesome_onoff'] == 'on') {
                wp_enqueue_style('font-awesome-4-6-1', plugins_url('ext/font-awesome-4.6.1/css/font-awesome.min.css', dirname(__FILE__)));
            }

            /**
             * wp_enqueue_style() WP Since: 2.6.0
             * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
             */
            wp_enqueue_style('melibu-all', plugins_url('css/all.min.css', dirname(__FILE__)));
            wp_enqueue_style('melibu-sss-admin', plugins_url('css/admin.min.css', dirname(__FILE__)));

            /**
             * wp_enqueue_script() WP Since: 2.1.0
             * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
             */
            wp_enqueue_script('melibu-sss-default-s', plugins_url('jsmin/default.min.js', dirname(__FILE__)), array(), '', true);
            wp_register_script('melibu-sss-script-js', plugins_url('jsmin/script.min.js', dirname(__FILE__)), array(), '', true);
            $obj = array(
                'mb_ajax_url' => get_bloginfo('url')
            );
            wp_localize_script('melibu-sss-script-js', 'melibu_sss_obj', $obj);
            wp_enqueue_script('melibu-sss-script-js');
            wp_register_script('melibu-sss-admin-js', plugins_url('jsmin/admin.min.js', dirname(__FILE__)), array('jquery'), 1.1, true);
            $obj = array(
                'mb_ajax_url' => get_bloginfo('url')
            );
            wp_localize_script('melibu-sss-admin-js', 'melibu_sss_admin_obj', $obj);
            wp_enqueue_script('melibu-sss-admin-js');
        }

        /**
         * Plugins Loaded
         */
        public function plugins_loaded() {

            $this->create(); // Create
            $this->update(); // Update
        }

        /**
         * Plugins Loaded Once on Activate
         */
        public function plugins_loaded_about() {

            /**
             * get_transient() WP Since: 2.8
             * https://codex.wordpress.org/Function_Reference/get_transient
             */
            if (!get_transient('melibu-plugin-social-page-activated')) {
                return;
            }

            /**
             * delete_transient() WP Since: 2.8
             * https://codex.wordpress.org/Function_Reference/delete_transient
             */
            delete_transient('melibu-plugin-social-page-activated');

            /**
             * wp_redirect() WP Since: 1.5.1
             * https://codex.wordpress.org/Function_Reference/wp_redirect
             */
            wp_redirect(
                    /**
                     * admin_url() WP Since:2.6.0
                     * https://codex.wordpress.org/Function_Reference/admin_url
                     */
                    admin_url('admin.php?page=melibu-plugin-social-admin-control-menu-6')
            );
            exit;
        }

        /**
         * AJAX
         */
        public function melibu_sss_admin_ajax() {

            global $MELIBU_PLUGIN_SHARE, $melibuPluginSSSBitly;

            if (isset($_POST) && !empty($_POST)) {
                $post = filter_input(INPUT_POST, 'actiontype');
                switch ($post) {
                    case 'save':
                        $MELIBU_PLUGIN_SHARE->save();
                        break;
                    case 'oauth':
                        $url = 'http://melibu.foundmyroom.de/oauth/bitly/bitly.php';
                        $params = array(
                            'oauth' => filter_input(INPUT_POST, 'oauth'),
                            'username' => filter_input(INPUT_POST, 'username'),
                            'password' => urlencode(filter_input(INPUT_POST, 'password'))
                        );
                        echo $melibuPluginSSSBitly->curl_post($url, $params);
                        break;
                    default :
                        break;
                }
            }
        }

    }

}
