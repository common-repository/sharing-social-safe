<?php
/**
 * MELIBU PLUGIN FRONTEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.1.5
 */
if (!class_exists('MELIBU_PLUGIN_FRONTEND_02')) {

    class MELIBU_PLUGIN_FRONTEND_02 {

        private $locale = '';

        /**
         *  Construct
         */
        public function __construct() {

            /**
             * add_action() WP Since: 1.2.0
             * @see https://developer.wordpress.org/reference/functions/add_action/
             */
            add_action('init', array($this, 'init'));
            add_action('plugins_loaded', array($this, 'plugins_loaded'));
            add_action('widgets_init', array($this, 'widgets_init'));
            add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
            add_action('wp_head', array($this, 'wp_head'));
            add_action('wp_ajax_melibu_sss_ajax', array($this, 'melibu_sss_ajax')); // for backend
            add_action('wp_ajax_nopriv_melibu_sss_ajax', array($this, 'melibu_sss_ajax')); // for frontend
            add_action('wp_footer', array($this, 'wp_footer'));
            add_action('init', array($this, 'init_session'), 1);

            /**
             * add_shortcode() WP Since: 2.5
             * @see https://codex.wordpress.org/Function_Reference/add_shortcode
             */
            add_shortcode('wp_mb_plugin_social', array($this, 'shortcode'));
        }

        /**
         * INIT
         */
        public function init() {

            $this->init_filters();
        }

        /**
         * Filters
         */
        public function init_filters() {

            /**
             * add_filter() WP Since: 0.71 
             * @see https://developer.wordpress.org/reference/functions/add_filter/
             */
            add_filter('widget_text', 'do_shortcode'); // Enable Shortcode in Text Widgets
            add_filter('tc_content_title_tag', array($this, 'tc_content_title_tag'));
            add_filter('the_content', array($this, 'the_content'));

            /**
             * apply_filters() WP Since: 0.71
             * @see https://developer.wordpress.org/reference/functions/apply_filters/
             */
            $this->locale = apply_filters('plugin_locale', get_locale(), 'sharing-social-safe');
        }

        /**
         * Session
         */
        public function init_session() {

            if (!session_id()) {
                session_start();
            }
        }

        /**
         * WP ENQUEUE SCRIPTS
         */
        public function wp_enqueue_scripts() {

            global $MELIBU_PLUGIN_OPTIONS_02;
            $mbPluginSSSoptions = $MELIBU_PLUGIN_OPTIONS_02->options();

            // CSS fontawesome
            $melibu_plugin_get_social = get_option('melibu_plugin_get_social');
            if (isset($melibu_plugin_get_social['fontawesome_onoff']) && $melibu_plugin_get_social['fontawesome_onoff'] == 'on') {
                wp_enqueue_style('font-awesome-4-6-1', plugins_url('ext/font-awesome-4.6.1/css/font-awesome.min.css', dirname(__FILE__)));
            }

            /**
             * wp_enqueue_style() WP Since: 2.6.0
             * @see https://developer.wordpress.org/reference/functions/wp_enqueue_style/
             */
            wp_enqueue_style('melibu-sss-style', plugins_url('css/style.min.css', dirname(__FILE__)));

            wp_enqueue_script('melibu-sss-default-js', plugins_url('jsmin/default.min.js', dirname(__FILE__)), array(), '', true);
            wp_register_script('melibu-sss-script-js', plugins_url('jsmin/script.min.js', dirname(__FILE__)), array(), '', true);
            $popup = (string) isset($mbPluginSSSoptions['pop-up']) ? $mbPluginSSSoptions['pop-up'] : '';
            $popupwidth = (int) isset($mbPluginSSSoptions['pop-up-width']) && !empty($mbPluginSSSoptions['pop-up-height']) ? $mbPluginSSSoptions['pop-up-width'] : 500;
            $popupheight = (int) isset($mbPluginSSSoptions['pop-up-height']) && !empty($mbPluginSSSoptions['pop-up-height']) ? $mbPluginSSSoptions['pop-up-height'] : 400;
            $popupresize = (string) isset($mbPluginSSSoptions['pop-up-resize']) ? $mbPluginSSSoptions['pop-up-resize'] : 'no';
            $popupnewwindow = (string) isset($mbPluginSSSoptions['pop-up-new-window']) ? $mbPluginSSSoptions['pop-up-new-window'] : '';
            $obj = array(
                'mb_ajax_url' => get_bloginfo('url'),
                'mb_pop_up' => $popup,
                'mb_pop_up_width' => $popupwidth,
                'mb_pop_up_height' => $popupheight,
                'mb_pop_up_resize' => $popupresize,
                'mb_pop_up_new_window' => $popupnewwindow
            );
            wp_localize_script('melibu-sss-script-js', 'melibu_sss_obj', $obj);
            wp_enqueue_script('melibu-sss-script-js');
        }

        /**
         * WP Head
         */
        public function wp_head() {

            /**
             * Get saved or default settings
             */
            global $MELIBU_PLUGIN_SHARE, $MELIBU_PLUGIN_OPTIONS_02;
            $mbPluginSSSoptions = $MELIBU_PLUGIN_OPTIONS_02->options(); // Options

            $excerpt = '';
            if (has_excerpt()) {
                $excerpt = wp_strip_all_tags(get_the_excerpt(), false); // true removes line breaks and whitespaces
            }
            
            $MELIBU_PLUGIN_SHARE->twitter_card($excerpt);
            $MELIBU_PLUGIN_SHARE->facebook_card($excerpt);
            $MELIBU_PLUGIN_SHARE->pinterest_rich_pin($excerpt);

            /**
             * Custom CSS
             */
            $customCSS = isset($mbPluginSSSoptions['custom-css']) && !empty($mbPluginSSSoptions['custom-css']) ? $mbPluginSSSoptions['custom-css'] : '';
            if ($customCSS) {
                ?><style type='text/css'><?php
                echo $customCSS;
                ?></style><?php
            }
        }

        /**
         * PLUGINS LOADED
         */
        public function plugins_loaded() {

            $this->load_textdomain();
        }

        /**
         * Load Textdomains
         */
        public function load_textdomain() {

            /**
             * load_textdomain() WP Since: 1.5.0
             * @see https://codex.wordpress.org/Function_Reference/load_textdomain
             */
            load_textdomain('sharing-social-safe', WP_LANG_DIR . "/plugins/sharing-social-safe/sharing-social-safe-$this->locale.mo");

            /**
             * load_plugin_textdomain() WP Since: 1.5.0
             * @see https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
             */
            load_plugin_textdomain('sharing-social-safe', false, plugin_basename(MELIBU_PLUGIN_PATH_02 . 'languages/'));
        }

        /**
         * SHORTCODE
         * 
         * @param type $atts
         * @param type $content
         * @return type
         */
        public function shortcode($atts, $content = null) {

            global $MELIBU_PLUGIN_SHARE, $MELIBU_PLUGIN_OPTIONS_02;

            /**
             * shortcode_atts() WP Since: 2.5
             * @see https://codex.wordpress.org/Function_Reference/shortcode_atts
             */
            $attr = shortcode_atts(array(
                'share' => 'wordpress,googleplus,facebook,twitter,xing,linkedin,tumblr,reddit,digg,delicious,stumbleupon,getpocket,pinterest,whatsapp,mail,print',
                'data' => 'wordpress,googleplus,facebook,twitter,xing,linkedin,tumblr,reddit,digg,delicious,stumbleupon,getpocket,pinterest,whatsapp,mail,print',
                'follow' => 'facebook,googleplus,twitter,flickr,pinterest,youtube,github,skype,snapchat,jsfiddle,instagram,soundcloud,xing,linkedin,tumblr,rss',
                'find' => 'facebook,googleplus,twitter,flickr,pinterest,youtube,github,skype,snapchat,jsfiddle,instagram,soundcloud,xing,linkedin,tumblr,rss',
                    ), $atts
            );

//            echo '<pre>';
//            var_dump($attr);
//            echo '</pre>';

            $shortcode = '';

            $mbPluginSSSoptions = $MELIBU_PLUGIN_OPTIONS_02->options();
            $userPostTypes = $MELIBU_PLUGIN_OPTIONS_02->post_types(true);
            foreach ($userPostTypes as $userPostType => $userPostTypeValue) {
                // Check if post type allowed
                if (isset($mbPluginSSSoptions[$userPostType]) && $mbPluginSSSoptions[$userPostType] == 'allow') {
                    $shortcode = $MELIBU_PLUGIN_SHARE->social($attr);
                }
            }

            return $shortcode;
        }

        /**
         *  WIDGETS INIT
         */
        public function widgets_init() {

            /**
             * register_widget()
             * @see https://codex.wordpress.org/Function_Reference/register_widget
             */
            require_once MELIBU_PLUGIN_PATH_02 . 'classes/class.MelibuFollowWidget.php';
            register_widget('MELIBU_PLUGIN_SOCIAL_FOLLOW_WIDGET_02');

            require_once MELIBU_PLUGIN_PATH_02 . 'classes/class.MelibuShareWidget.php';
            register_widget('MELIBU_PLUGIN_SOCIAL_SHARE_WIDGET_02');
        }

        /**
         * 
         * @param type $content
         * @return string
         */
        public function the_content($content) {

            global $MELIBU_PLUGIN_OPTIONS_02;
            $settings = $MELIBU_PLUGIN_OPTIONS_02->settings();
            $mbPluginSSSoptions = $MELIBU_PLUGIN_OPTIONS_02->options();

            $string = '';
            $return = $content;
            $modal = (isset($mbPluginSSSoptions['modal']) && !empty($mbPluginSSSoptions['modal']) ? $mbPluginSSSoptions['modal'] : '');
            $string .= '<p style="padding: 0; margin:0; font-size:14px;">'
                    . '<i class="fa fa-print" aria-hidden="true"></i> '
                    . '<a class="melibu-share-button prints" href="#" data-mb-sss-click="share"  data-mb-sss-perma="' . get_the_permalink() . '">print</a> ';
            if ($modal == 'on') {
                $string .= '| ';
                $string .= '<span style="padding: 0; margin:0; font-size:14px;" class="melibu_social_title_clicker">'
                        . '<i class="fa fa-share-alt-square" aria-hidden="true"></i> '
                        . '<a href="#" class="melibu-share-button-link" href="#">share</a>'
                        . '</span>';
            }
            $string .= '</p>';

            if ($settings['contentbefore'] == 'on' && $settings['contentafter'] == 'on') {
                $return = $string . $content . $string;
            } else if ($settings['contentbefore'] == 'on') {
                $return = $string . $content;
            } else if ($settings['contentafter'] == 'on') {
                $return = $content . $string;
            }

            return $return;
        }

        /**
         * 
         * @return string
         */
        public function tc_content_title_tag() {
            return 'h2';
        }

        /**
         * WP_FOOTER
         */
        public function wp_footer() {

            require_once MELIBU_PLUGIN_PATH_02 . 'tpl/modal.php';
        }

        /**
         * AJAX
         */
        public function melibu_sss_ajax() {

            global $MELIBU_PLUGIN_SHARE;
            if (isset($_POST) && !empty($_POST)) {
                $post = filter_input(INPUT_POST, 'actiontype');
                switch ($post) {
                    case 'click':
                        $MELIBU_PLUGIN_SHARE->save_click();
                        break;
                    default :
                        break;
                }
            }
        }

    }

    global $MELIBU_PLUGIN_FRONTEND_02;
    $MELIBU_PLUGIN_FRONTEND_02 = new MELIBU_PLUGIN_FRONTEND_02(); // Instantiate the plugin class
}
