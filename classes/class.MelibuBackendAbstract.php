<?php
if (!class_exists('MELIBU_PLUGIN_BACKEND_02_ABSTRACT')) {

    abstract class MELIBU_PLUGIN_BACKEND_02_ABSTRACT {

        const VERSION = '1.7.1.2';
        const DB_VERSION = '1.1.1.49';

        private $DB = null;

        /**
         * Create Custom Tables
         */
        public function create() {

            set_time_limit(0); // no PHP timeout for running install

            /**
             * Create Custom Table
             * https://codex.wordpress.org/Creating_Tables_with_Plugins
             */
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

            global $wpdb;
            $this->DB = $wpdb;

            $charset_collate = $this->DB->get_charset_collate();

            $table_name = $this->DB->prefix . 'melibu_sss';
            $create_sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
		id INT(11) NOT NULL AUTO_INCREMENT,
		name VARCHAR(100) NOT NULL,
                value VARCHAR(100) NOT NULL,
                time INT(11) NOT NULL,
		PRIMARY KEY id (id)
            ) $charset_collate;";

            dbDelta($create_sql);
            
            $table_stats = $this->DB->prefix . 'melibu_sss_s';
            $create_sql_stats = "CREATE TABLE IF NOT EXISTS " . $table_stats . " (
		id int(11) NOT NULL AUTO_INCREMENT, 
		agent VARCHAR(255) NOT NULL, 
		social VARCHAR(100) NOT NULL, 
                page VARCHAR(155) NOT NULL, 
                clicks VARCHAR(100) NOT NULL, 
                type VARCHAR(100) NOT NULL, 
                time INT(11) NOT NULL, 
		PRIMARY KEY id (id)
            ) $charset_collate;";

            dbDelta($create_sql_stats);
        }

        /**
         * Update Custom Tables
         * @global type $wpdb
         * @return type
         */
        public function update() {

            global $wpdb;
            $this->DB = $wpdb;

            set_time_limit(0); // no PHP timeout for running update

            /**
             * get_option() WP Since: 1.5.0
             * https://codex.wordpress.org/Function_Reference/get_option
             */
            if (self::DB_VERSION > get_option('melibu-plugin-social-db-version')) {

                /**
                 * Update Custom Tables
                 */
                $melibu_sss = $this->DB->prefix . 'melibu_sss';
                $melibu_sss_s = $this->DB->prefix . 'melibu_sss_s';

                $row1 = $this->DB->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name='" . $melibu_sss . "' AND column_name='type'");
                if (empty($row1)) {
                    $alter_sql1 = "ALTER TABLE " . $melibu_sss . " ADD type VARCHAR(150) NOT NULL;";
                    $this->DB->query($alter_sql1);
                }

                $row2 = $this->DB->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name='" . $melibu_sss . "' AND column_name='value'");
                if (!empty($row2)) {
                    $alter_sql2 = "ALTER TABLE " . $melibu_sss . " MODIFY value TEXT NOT NULL;";
                    $this->DB->query($alter_sql2);
                }

                $row3 = $this->DB->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name='" . $melibu_sss_s . "' AND column_name='perma'");
                if (empty($row3)) {
                    $alter_sql3 = "ALTER TABLE " . $melibu_sss_s . " ADD perma VARCHAR(255) NOT NULL;";
                    $this->DB->query($alter_sql3);
                }

                $row4 = $this->DB->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name='" . $melibu_sss_s . "' AND column_name='page'");
                if (!empty($row4)) {
                    $alter_sql4 = "ALTER TABLE " . $melibu_sss_s . " MODIFY page VARCHAR(255) NOT NULL;";
                    $this->DB->query($alter_sql4);
                }

                /**
                 * update_option() WP Since: 1.0.0
                 * https://codex.wordpress.org/Function_Reference/update_option
                 */
                update_option("melibu-plugin-social-db-version", self::DB_VERSION);
            }

            if (self::VERSION > get_option('melibu-plugin-social-version')) {

                update_option("melibu-plugin-social-version", self::VERSION);
            }
        }

        /**
         * 
         */
        public function init_options() {

            /**
             * add_option() WP Since: 1.0.0
             * https://codex.wordpress.org/Function_Reference/add_option
             */
            add_option('melibu-plugin-social-version', self::VERSION);
            add_option('melibu-plugin-social-db-version', self::DB_VERSION);
        }

        /**
         * 
         */
        public function init_filter() {

            /**
             * add_filter() WP Since: 0.71
             * https://developer.wordpress.org/reference/functions/add_filter/
             */
            add_filter('mce_buttons', array($this, 'add_button'));
            add_filter("mce_external_plugins", array($this, 'register_button'));
            add_filter('user_contactmethods', array($this, 'extra_contact_info'));
        }

        /**
         * 
         * @param type $contactmethods
         * @return string
         */
        public function extra_contact_info($contactmethods) {

            // Remove the old, unused fields.
            unset($contactmethods['aim']);
            unset($contactmethods['yim']);
            unset($contactmethods['jabber']);

            $contactmethods['phonenumber'] = __('Phonenumber', 'mb-author-box');
            $contactmethods['facebook'] = 'Facebook';
            $contactmethods['googleplus'] = 'Google Plus';
            $contactmethods['twitter'] = 'Twitter';
            $contactmethods['flickr'] = 'Flickr';
            $contactmethods['pinterest'] = 'Pinterest';
            $contactmethods['youtube'] = 'Youtube';
            $contactmethods['github'] = 'Github';
            $contactmethods['tumblr'] = 'Tumblr';
            $contactmethods['soundcloud'] = 'SoundCloud';
            $contactmethods['skype'] = 'Skype';
            $contactmethods['xing'] = 'Xing';
            $contactmethods['instagram'] = 'Instagram';
            $contactmethods['whatsapp'] = 'WhatsApp';
            $contactmethods['jsfiddle'] = 'jsFiddle';
            $contactmethods['snapchat'] = 'SnapChat';
            $contactmethods['linkedin'] = 'LinkedIn';
            
            return $contactmethods;
        }

        /**
         * 
         * @param type $buttons
         * @return type
         */
        public function add_button($buttons) {

            /**
             * array_push() PHP Since: PHP 4
             * http://php.net/manual/de/function.array-push.php
             */
            array_push($buttons, "mb_plugin_social_button");
            array_push($buttons, "mb_plugin_social_button_find");
            return $buttons;
        }

        /**
         * 
         * @param array $plugin_array
         * @return type
         */
        public function register_button($plugin_array) {

            /**
             * plugins_url() WP Since: 2.6.0
             * https://codex.wordpress.org/Function_Reference/plugins_url
             */
            $plugin_array['mb_plugin_social_button'] = plugins_url("jsmin/shortcode.min.js", dirname(__FILE__));
            $plugin_array['mb_plugin_social_button_find'] = plugins_url("jsmin/shortcode.min.js", dirname(__FILE__));
            return $plugin_array;
        }

        /**
         * 
         */
        public function init_settings() {

            /**
             * register_setting() WP Since: 2.7.0
             * https://codex.wordpress.org/Function_Reference/register_setting
             */
            register_setting(
                    "melibu_plugin_social", // Setting
                    "melibu_plugin_get_social", // Option
                    array($this, 'save_option') // Function
            );

            register_setting(
                    "melibu_plugin_social_privacy", // Setting
                    "melibu_plugin_get_social_privacy", // Option
                    array($this, 'save_option') // Function
            );

            register_setting(
                    "melibu_plugin_social_privacy_opt", // Setting
                    "melibu_plugin_get_social_privacy_opt", // Option
                    array($this, 'save_option') // Function
            );

            register_setting(
                    "melibu_plugin_social_options", // Setting
                    "melibu_plugin_get_social_options", // Option
                    array($this, 'save_option') // Function
            );

            register_setting(
                    "melibu_plugin_social_copy", // Setting
                    "melibu_plugin_get_social_copy", // Option
                    array($this, 'save_option') // Function
            );

            register_setting(
                    "melibu_plugin_social_share", // Setting
                    "melibu_plugin_get_social_share", // Option
                    array($this, 'save_option') // Function
            );

            register_setting(
                    "melibu_plugin_social_count", // Setting
                    "melibu_plugin_get_social_count", // Option
                    array($this, 'save_option') // Function
            );

            register_setting(
                    "melibu_plugin_social_bitly", // Setting
                    "melibu_plugin_get_social_bitly", // Option
                    array($this, 'save_option') // Function
            );
        }

        /**
         * 
         * @param type $input
         * @return boolean
         */
        public function save_option($input) {

            $return = $input;
            if (!empty($_POST) && check_admin_referer('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce')) {

                /**
                 * https://codex.wordpress.org/Function_Reference/current_user_can
                 * https://codex.wordpress.org/Roles_and_Capabilities
                 * since 2.0.0
                 */
                if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
                    $return = false;
                }

                return $return;
            }
        }

        /**
         * 
         * @return type
         */
        public function save_upload() {

            if (!function_exists('wp_handle_upload')) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }

            if (!empty($_POST) && check_admin_referer('melibu-plugin-social-nonce-action', 'melibu-plugin-social-nonce')) {

                /**
                 * https://codex.wordpress.org/Function_Reference/current_user_can
                 * https://codex.wordpress.org/Roles_and_Capabilities
                 * since 2.0.0
                 */
                if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
                    return false;
                }

                $melibuPlugin_get_download_button_logo = get_option('melibu-plugin-social-logo-get');
                unlink($melibuPlugin_get_download_button_logo['file']);

                $uploadedfile = $_FILES['melibu-plugin-template-logo-get'];
                $upload_overrides = array('test_form' => false);
                $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

                if ($movefile && !isset($movefile['error'])) {
                    return $movefile;
                } else {
                    /**
                     * Error generated by _wp_handle_upload()
                     * @see _wp_handle_upload() in wp-admin/includes/file.php
                     */
                    echo $movefile['error'];
                }
            }
        }

    }

}
