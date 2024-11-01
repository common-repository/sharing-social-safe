<?php

require_once 'class.MelibuSocialLinks.php';
/**
 * Melibu Social
 *
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_SHARE')) {

    class MELIBU_PLUGIN_SHARE extends MELIBU_PLUGIN_SHARE_LINKS {

        protected $listStyle = false;
        protected $options = array();
        
        /**
         * 
         * @global type $MELIBU_PLUGIN_OPTIONS_02
         */
        public function __construct() {
            
            global $MELIBU_PLUGIN_OPTIONS_02;
            $this->options = $MELIBU_PLUGIN_OPTIONS_02->options();
        }

        /**
         * SOCIAL
         * 
         * @param type $atts
         * @return string
         */
        public function social($atts) {

            $backturn = '<!-- MELIBU SHARING SOCIAL SAFE BY SAMET TARIM -->';
            // SHARE
            if (isset($atts['data']) || isset($atts['share'])) {
                $backturn .= $this->share($atts); // Share
            }
            // FOLOW
            else if (isset($atts['find']) || isset($atts['follow'])) {
                $backturn .= $this->follow($atts); // Follow
            }
            $backturn .= '<!-- MELIBU SHARING SOCIAL SAFE BY SAMET TARIM -->';
            return $backturn;
        }

        /**
         * SHARE
         * 
         * @param type $atts
         * @return string
         */
        public function share($atts) {

            global $melibuPluginSSSBitly;

            $teile = '';

            // filter data and share
            if (isset($atts['data']) && !empty($atts['data'])) {
                $teile = explode(",", $atts['data']);
            } else if (isset($atts['share']) && !empty($atts['share'])) {
                $teile = explode(",", $atts['share']);
            }

            if (!$teile) {
                return;
            }

            // Design
            $melibu_social_check_result = $this->get_by_name('button_design');
            $melibu_social_check_set = 'long';
            if ($melibu_social_check_result) {
                $melibu_social_check_set = $melibu_social_check_result;
            }

            $return = $melibuPluginSSSBitly->user_link_lookup(get_permalink(get_the_ID()));
            $short_url = $melibuPluginSSSBitly->shorten(get_the_permalink(get_the_ID())); // Shorten when bitly active

            $backturn = '<div class="mb-sharing-social-safe">';

            // Counts on
            $melibu_plugin_get_social_count = get_option('melibu_plugin_get_social_count');
            if (isset($melibu_plugin_get_social_count['onoff']) && $melibu_plugin_get_social_count['onoff'] == 'on') {
                $backturn .= '<em>' . __('Already', 'sharing-social-safe') . ' <strong class="mb-plugin-sss-count-share">' . $this->get_count_by_url($return['bitly_perma']) . '</strong> ' . __('times divided', 'sharing-social-safe') . '...</em>';
            }

            $backturn .= '<div class="' . $melibu_social_check_set . '">';

            if (in_array("wordpress", $teile)) {
                $backturn .= $this->set_share_btn('wordpress', 'wordpresss', substr(get_the_content(get_the_ID()), 0, 50), 'fa-wordpress', $melibu_social_check_set, $short_url);
            }
            if (in_array("googleplus", $teile)) {
                $backturn .= $this->set_share_btn('Google+', 'googlepluss', '', 'fa-google-plus', $melibu_social_check_set, $short_url);
            }
            if (in_array("facebook", $teile)) {
                $backturn .= $this->set_share_btn('Facebook', 'facebooks', '', 'fa-facebook', $melibu_social_check_set, $short_url);
            }
            if (in_array("twitter", $teile)) {
                $backturn .= $this->set_share_btn('Twitter', 'twitters', '', 'fa-twitter', $melibu_social_check_set, $short_url);
            }
            if (in_array("xing", $teile)) {
                $backturn .= $this->set_share_btn('Xing', 'xings', '', 'fa-xing', $melibu_social_check_set, $short_url);
            }
            if (in_array("linkedin", $teile)) {
                $backturn .= $this->set_share_btn('LinkedIn', 'linkedins', '', 'fa-linkedin', $melibu_social_check_set, $short_url);
            }
            if (in_array("tumblr", $teile)) {
                $backturn .= $this->set_share_btn('tumblr', 'tumblrs', substr(get_the_content(get_the_ID()), 0, 50), 'fa-tumblr', $melibu_social_check_set, $short_url);
            }
            if (in_array("reddit", $teile)) {
                $backturn .= $this->set_share_btn('reddit', 'reddits', '', 'fa-reddit-alien', $melibu_social_check_set, $short_url);
            }
            if (in_array("digg", $teile)) {
                $backturn .= $this->set_share_btn('digg', 'diggs', '', 'fa-digg', $melibu_social_check_set, $short_url);
            }
            if (in_array("delicious", $teile)) {
                $backturn .= $this->set_share_btn('delicious', 'deliciouss', '', 'fa-delicious', $melibu_social_check_set, $short_url);
            }
            if (in_array("stumbleupon", $teile)) {
                $backturn .= $this->set_share_btn('stumbleupon', 'stumbleupons', '', 'fa-stumbleupon', $melibu_social_check_set, $short_url);
            }
            if (in_array("getpocket", $teile)) {
                $backturn .= $this->set_share_btn('getpocket', 'getpockets', '', 'fa-get-pocket', $melibu_social_check_set, $short_url);
            }
            if (in_array("pinterest", $teile)) {
                if (false !== $this->pinterest(get_permalink(get_the_ID()), get_the_title(get_the_ID()))) { // Check if attachment
                    $backturn .= $this->set_share_btn('Pinterest', 'pinterests', '', 'fa-pinterest-p', $melibu_social_check_set, $short_url);
                }
            }
            if (in_array("whatsapp", $teile)) {
                $backturn .= $this->set_share_btn('WhatsApp', 'whatsapps', '', 'fa-whatsapp', $melibu_social_check_set, $short_url);
            }
            if (in_array("mail", $teile)) {
                $backturn .= $this->set_share_btn('Mail', 'mailits', '', 'fa-envelope-o', $melibu_social_check_set, $short_url);
            }
            if (in_array("print", $teile)) {
                $backturn .= $this->set_share_btn('Print', 'prints', '', 'fa-print', $melibu_social_check_set, $short_url);
            }

            $backturn .= '<div class="st-clear"></div>';

            $melibu_plugin_get_social_privacy_opt = get_option('melibu_plugin_get_social_privacy_opt');
            $melibu_plugin_get_social_privacy = get_option('melibu_plugin_get_social_privacy');

            if (isset($melibu_plugin_get_social_privacy_opt['onoff']) && $melibu_plugin_get_social_privacy_opt['onoff'] == 'on') {

                $backturn .= '<div class="st-tooltip">';
                $backturn .= '<span>';
                if (isset($melibu_plugin_get_social_privacy['info_link']) && $melibu_plugin_get_social_privacy['info_link'] != '') {
                    $backturn .= '<a href="' . (isset($melibu_plugin_get_social_privacy['info_link']) ? $melibu_plugin_get_social_privacy['info_link'] : '#') . '" title="' . __('Click for more Privacy', 'sharing-social-safe') . '">';
                }
                $backturn .= '?';
                if (isset($melibu_plugin_get_social_privacy['info_link']) && $melibu_plugin_get_social_privacy['info_link'] != '') {
                    $backturn .= '</a>';
                }
                $backturn .= '</span>';
                $backturn .= '<div class="content">';
                $backturn .= '<b></b>';
                if (isset($melibu_plugin_get_social_privacy['info_title']) && $melibu_plugin_get_social_privacy['info_title'] != '') {
                    $backturn .= '<h3>' . __(isset($melibu_plugin_get_social_privacy['info_title']) ? $melibu_plugin_get_social_privacy['info_title'] : '', 'sharing-social-safe') . '</h3>';
                } else {
                    $backturn .= '<h3>' . __('Privacy', 'sharing-social-safe') . '</h3>';
                }
                if (isset($melibu_plugin_get_social_privacy['info_text']) && $melibu_plugin_get_social_privacy['info_text'] != '') {
                    $backturn .= '<p>' . __(isset($melibu_plugin_get_social_privacy['info_text']) ? $melibu_plugin_get_social_privacy['info_text'] : '', 'sharing-social-safe') . '</p>';
                } else {
                    $backturn .= __('Privacy info Box, insert your own text and linked with a page', 'sharing-social-safe') . '.';
                }
                $backturn .= '</div>';
                $backturn .= '</div>';
            }

            $backturn .= '<div class="st-clear"></div>';
            $backturn .= '</div>';

            $melibu_plugin_get_social_copy = get_option('melibu_plugin_get_social_copy');
            if (isset($melibu_plugin_get_social_copy['onoff']) && $melibu_plugin_get_social_copy['onoff'] == 'on') {

                $backturn .= '<div class="st-social-copy">';
                $backturn .= __('Powerd by', 'sharing-social-safe') . ' &copy; <a href="https://www.tnado.com/" target="_blank">Melabu</a>';
                $backturn .= '</div>';
            }

            $backturn .= '</div>';

            return $backturn;
        }

        /**
         * FOLLOW Settings
         * 
         * @return array
         */
        public function follow_settings() {

            global $MELIBU_PLUGIN_OPTIONS_02;
            $mbPluginSSSoptions = $MELIBU_PLUGIN_OPTIONS_02->options();

            $followUser = (isset($mbPluginSSSoptions['follow-user']) ? $mbPluginSSSoptions['follow-user'] : '');
            if ($followUser == 'admin') {
                $userID = (isset($mbPluginSSSoptions['follow-user-allowed']) ? $mbPluginSSSoptions['follow-user-allowed'] : '');
            } else {
                if (!get_the_author_meta('ID')) {
                    $userID = get_current_user_id();
                } else {
                    $userID = get_the_author_meta('ID');
                }
            }

            $facebook = get_the_author_meta('facebook', $userID);
            $googleplus = get_the_author_meta('googleplus', $userID);
            $twitter = get_the_author_meta('twitter', $userID);
            $flickr = get_the_author_meta('flickr', $userID);
            $pinterest = get_the_author_meta('pinterest', $userID);
            $youtube = get_the_author_meta('youtube', $userID);
            $github = get_the_author_meta('github', $userID);
            $tumblr = get_the_author_meta('tumblr', $userID);
            $soundcloud = get_the_author_meta('soundcloud', $userID);
            $skype = get_the_author_meta('skype', $userID);
            $xing = get_the_author_meta('xing', $userID);
            $instagram = get_the_author_meta('instagram', $userID);
            $whatsapp = get_the_author_meta('whatsapp', $userID);
            $jsfiddle = get_the_author_meta('jsfiddle', $userID);
            $snapchat = get_the_author_meta('snapchat', $userID);
            $linkedIn = get_the_author_meta('linkedin', $userID);
            $rss = get_the_author_meta('rss', $userID);

            $socialMedia = array(
                array('class' => 'facebooks', 'icon' => 'fa fa-facebook-square', 'title' => 'Facebook', 'link' => $facebook),
                array('class' => 'googlepluss', 'icon' => 'fa fa-google-plus-square', 'title' => 'Google Plus', 'link' => $googleplus),
                array('class' => 'twitters', 'icon' => 'fa fa-twitter-square', 'title' => 'Twitter', 'link' => $twitter),
                array('class' => 'flickrs', 'icon' => 'fa fa-flickr', 'title' => 'Flickr', 'link' => $flickr),
                array('class' => 'pinterests', 'icon' => 'fa fa-pinterest-square', 'title' => 'Pinterest', 'link' => $pinterest),
                array('class' => 'youtubes', 'icon' => 'fa fa-youtube-square', 'title' => 'YouTube', 'link' => $youtube),
                array('class' => 'githubs', 'icon' => 'fa fa-github-square', 'title' => 'GitHub', 'link' => $github),
                array('class' => 'tumblrs', 'icon' => 'fa fa-tumblr-square', 'title' => 'Tumblr', 'link' => $tumblr),
                array('class' => 'soundclouds', 'icon' => 'fa fa-soundcloud', 'title' => 'Soundcloud', 'link' => $soundcloud),
                array('class' => 'skypes', 'icon' => 'fa fa-skype', 'title' => 'Skype', 'link' => $skype),
                array('class' => 'xings', 'icon' => 'fa fa-xing-square', 'title' => 'Xing', 'link' => $xing),
                array('class' => 'instagrams', 'icon' => 'fa fa-instagram', 'title' => 'Instagram', 'link' => $instagram),
                array('class' => 'whatsapps', 'icon' => 'fa fa-whatsapp', 'title' => 'WhatsApp', 'link' => $whatsapp),
                array('class' => 'jsfiddles', 'icon' => 'fa fa-jsfiddle', 'title' => 'JS Fiddle', 'link' => $jsfiddle),
                array('class' => 'snapchats', 'icon' => 'fa fa-snapchat-square', 'title' => 'Snap Chat', 'link' => $snapchat),
                array('class' => 'linkedins', 'icon' => 'fa fa-linkedin-square', 'title' => 'LinkedIn', 'link' => $linkedIn),
                array('class' => 'rsss', 'icon' => 'fa fa-rss-square', 'title' => 'RSS', 'link' => $rss)
            );

            return $socialMedia;
        }

        /**
         * FOLLOW
         * 
         * @param type $atts
         * @return string
         */
        public function follow($atts) {

            global $melibuPluginSSSBitly;

            $teile = '';

            // Filter find and follow
            if (isset($atts['find']) && !empty($atts['find'])) {
                $teile = explode(",", $atts['find']);
            } else if (isset($atts['follow']) && !empty($atts['follow'])) {
                $teile = explode(",", $atts['follow']);
            }

            if (!$teile) {
                return;
            }

            $return = $melibuPluginSSSBitly->user_link_lookup(get_permalink());

            $backturn = '<div class="mb-sharing-social-safe">';

            // Remove all commatas to show is empty
            if (!empty(str_replace(",", "", $atts['follow']))) {
                $melibu_plugin_get_social_count = get_option('melibu_plugin_get_social_count');
                if (isset($melibu_plugin_get_social_count['onoff']) && $melibu_plugin_get_social_count['onoff'] == 'on') {
                    $backturn .= '<em>' . __('Already', 'sharing-social-safe') . ' <strong class="mb-plugin-sss-count-follow">' . $this->get_count_by_url($return['bitly_perma'], 'follow') . '</strong> ' . __('times followed', 'sharing-social-safe') . '...</em>';
                }
            }

            $melibu_plugin_get_social_count_singlecount = '';
            if (isset($melibu_plugin_get_social_count['singlecount']) && !empty($melibu_plugin_get_social_count['singlecount'])) {
                $melibu_plugin_get_social_count_singlecount = $melibu_plugin_get_social_count['singlecount'];
            }

            // Design
            $melibu_social_check_result = $this->get_by_name('button_design');
            $melibu_social_check_set = 'long';
            if ($melibu_social_check_result) {
                $melibu_social_check_set = $melibu_social_check_result;
            }
            $backturn .= '<div class="' . $melibu_social_check_set . '">';

            $social_media = $this->follow_settings();
            foreach ($social_media as $key => $value) {

                if (isset($value['link']) && !empty($value['link'])) {
                    if (in_array(substr($value['class'], 0, (strlen($value['class']) - 1)), $teile)) {

                        $backturn .= '<a rel="popup" href="' . $value['link'] . '" target="_blank" class="melibu-share-button ' . $value['class'] . '" data-mb-sss-click="follow" data-mb-sss-perma="' . get_permalink() . '">';
                        $backturn .= '<span class="melibu-share-button__inner">';
                        $backturn .= '<span class="melibu-share-button__shine"></span>';
                        $backturn .= '<span class="melibu-share-button__icon">';
                        $backturn .= '<i class="' . $value['icon'] . '" aria-hidden="true"></i>';
                        $backturn .= '</span>';

                        if ($melibu_plugin_get_social_count_singlecount == 'on') {
                            $backturn .= '<span class="melibu-share-button__count">';
                            $backturn .= $this->get_count_by_social(substr($value['class'], 0, -1), 'follow');
                            $backturn .= '</span>';
                        }

                        $backturn .= '</span>';
                        $backturn .= $this->socialTranslate($melibu_social_check_set);
                        $backturn .= '</a>';
                    }
                }
            }

            $backturn .= '<div class="st-clear"></div>';
            $backturn .= '</div>';

            $melibu_plugin_get_social_copy = get_option('melibu_plugin_get_social_copy');
            if (isset($melibu_plugin_get_social_copy['onoff']) && $melibu_plugin_get_social_copy['onoff'] == 'on') {
                $backturn .= '<div class="st-social-copy">';
                $backturn .= __('Powerd by', 'sharing-social-safe') . ' &copy; <a href="https://www.tnado.com/" target="_blank">Melabu</a>';
                $backturn .= '</div>';
            }

            $backturn .= '</div>';

            return $backturn;
        }
        
        /**
         * 
         * @return string
         */
        public function share_settings() {

            $socialModalMedia = array("share" =>
                (isset($this->options["modal-wordpress"]) ? $this->options["modal-wordpress"] . ',' : '') .
                (isset($this->options["modal-googleplus"]) ? $this->options["modal-googleplus"] . ',' : '') .
                (isset($this->options["modal-facebook"]) ? $this->options["modal-facebook"] . ',' : '') .
                (isset($this->options["modal-twitter"]) ? $this->options["modal-twitter"] . ',' : '') .
                (isset($this->options["modal-xing"]) ? $this->options["modal-xing"] . ',' : '') .
                (isset($this->options["modal-linkedin"]) ? $this->options["modal-linkedin"] . ',' : '') .
                (isset($this->options["modal-tumblr"]) ? $this->options["modal-tumblr"] . ',' : '') .
                (isset($this->options["modal-reddit"]) ? $this->options["modal-reddit"] . ',' : '') .
                (isset($this->options["modal-digg"]) ? $this->options["modal-digg"] . ',' : '') .
                (isset($this->options["modal-delicious"]) ? $this->options["modal-delicious"] . ',' : '') .
                (isset($this->options["modal-stumbleupon"]) ? $this->options["modal-stumbleupon"] . ',' : '') .
                (isset($this->options["modal-getpocket"]) ? $this->options["modal-getpocket"] . ',' : '') .
                (isset($this->options["modal-pinterest"]) ? $this->options["modal-pinterest"] . ',' : '') .
                (isset($this->options["modal-whatsapp"]) ? $this->options["modal-whatsapp"] . ',' : '') .
                (isset($this->options["modal-mail"]) ? $this->options["modal-mail"] . ',' : '') .
                (isset($this->options["modal-print"]) ? $this->options["modal-print"] . ',' : '')
            );
            
            return $socialModalMedia;
        }
        
        /**
         * 
         * @return type
         */
        public function user_follow() {
            
            $socialMedia = array();
            
            $followUser = (isset($this->options['follow-user']) ? $this->options['follow-user'] : '');
            if ($followUser == 'admin') {
                $userID = (isset($this->options['follow-user-allowed']) ? $this->options['follow-user-allowed'] : '');
            } else {
                if (!get_the_author_meta('ID')) {
                    $userID = get_current_user_id();
                } else {
                    $userID = get_the_author_meta('ID');
                }
            }

            $barFollowOrShare = (isset($this->options['bar-follow-or-share']) && !empty($this->options['bar-follow-or-share']) ? $mbPluginSSSoptions['bar-follow-or-share'] : '');
            if ($barFollowOrShare == 'follow') {
                $socialMedia = array("follow" =>
                    (get_the_author_meta('facebook', $userID) !== null ? 'facebook,' : '') .
                    (get_the_author_meta('googleplus', $userID) !== null ? 'googleplus,' : '') .
                    (get_the_author_meta('twitter', $userID) !== null ? 'twitter,' : '') .
                    (get_the_author_meta('flickr', $userID) !== null ? 'flickr,' : '') .
                    (get_the_author_meta('pinterest', $userID) !== null ? 'pinterest,' : '') .
                    (get_the_author_meta('youtube', $userID) !== null ? 'youtube,' : '') .
                    (get_the_author_meta('github', $userID) !== null ? 'github,' : '') .
                    (get_the_author_meta('tumblr', $userID) !== null ? 'tumblr,' : '') .
                    (get_the_author_meta('soundcloud', $userID) !== null ? 'soundcloud,' : '') .
                    (get_the_author_meta('skype', $userID) !== null ? 'skype,' : '') .
                    (get_the_author_meta('xing', $userID) !== null ? 'xing,' : '') .
                    (get_the_author_meta('instagram', $userID) !== null ? 'instagram,' : '') .
                    (get_the_author_meta('whatsapp', $userID) !== null ? 'whatsapp,' : '') .
                    (get_the_author_meta('jsfiddle', $userID) !== null ? 'jsfiddle,' : '') .
                    (get_the_author_meta('snapchat', $userID) !== null ? 'snapchat,' : '') .
                    (get_the_author_meta('linkedin', $userID) !== null ? 'linkedin,' : '') .
                    (get_the_author_meta('rss', $userID) !== null ? 'rss,' : '')
                );
            } else if ($barFollowOrShare == 'share') {
                $socialMedia = $this->share_settings();
            }

            return $socialMedia;
        }

    }

    global $MELIBU_PLUGIN_SHARE;
    $MELIBU_PLUGIN_SHARE = new MELIBU_PLUGIN_SHARE(); // Instantiate the plugin class
}