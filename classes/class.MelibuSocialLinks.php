<?php

require_once 'class.MelibuSocialHeads.php';
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
if (!class_exists('MELIBU_PLUGIN_SHARE_LINKS')) {

    class MELIBU_PLUGIN_SHARE_LINKS extends MELIBU_PLUGIN_SHARE_HEADS {

        /**
         * Swith links
         * 
         * @param type $css
         * @param type $link
         * @param type $title
         * @param type $extra
         * @return type
         */
        public function get_share_button_url($css, $link, $title = '', $extra = '') {
            $url = '';
            switch ($css) {
                case 'wordpresss':
                    $url = $this->wordpress($link, $title, $extra);
                    break;
                case 'googlepluss':
                    $url = $this->googlePlus($link);
                    break;
                case 'facebooks':
                    $url = $this->facebook($link, $title);
                    break;
                case 'twitters':
                    $url = $this->twitter($link, $title);
                    break;
                case 'xings':
                    $url = $this->xing($link);
                    break;
                case 'linkedins':
                    $url = $this->linkedin($link, $title);
                    break;
                case 'tumblrs':
                    $url = $this->tumblr($link, $title, $extra);
                    break;
                case 'reddits':
                    $url = $this->reddit($link, $title);
                    break;
                case 'diggs':
                    $url = $this->digg($link, $title);
                    break;
                case 'deliciouss':
                    $url = $this->delicious($link, $title);
                    break;
                case 'stumbleupons':
                    $url = $this->stumbleupon($link, $title);
                    break;
                case 'getpockets':
                    $url = $this->getpocket($link, $title);
                    break;
                case 'buffers':
                    $url = $this->buffer($link, $title);
                    break;
                case 'bloggers':
                    $url = $this->blogger($link, $title, $extra);
                    break;
                case 'pinterests':
                    $url = $this->pinterest($link, $title);
                    break;
                case 'whatsapps':
                    $url = $this->whatsapp($link);
                    break;
                case 'mailits':
                    $url = $this->mail($link, $title);
                    break;
                case 'prints':
                    $url = $this->printer();
                    break;
                default :
                    break;
            }
            return esc_url($url);
        }

        /**
         * Wordpress
         * 
         * https://plus.google.com/share?url={url}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function wordpress($url = '', $title = '', $description = '') {

            $newurl = urlencode($url);
            $newtitle = $this->wp_encoding_string($title);
            $newdescription = $this->wp_get_text($description);
            $imgurl = '';
            if (has_post_thumbnail(get_the_ID())) {
                if (get_the_post_thumbnail_url(get_the_ID())) {
                    $imgurl = urlencode(get_the_post_thumbnail_url(get_the_ID()));
                } else {
                    $imgurl = wp_get_attachment_url(get_post_thumbnail_id());
                }
            }
            $query = '?u=' . $newurl . '&t=' . $newtitle . '&s=' . $this->wp_encoding_string($newdescription) . '&i=' . $imgurl;
            return 'http://wordpress.com/press-this.php' . $this->wp_encoding_url($query);
        }

        /**
         * Google+
         * 
         * https://plus.google.com/share?url={url}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function googlePlus($url = '') {
            $newurl = urlencode($url);
            $query = '?url=' . $newurl . '&hl=' . get_bloginfo('language');
            return 'https://plus.google.com/share' . $this->wp_encoding_url($query);
        }

        /**
         * Google+ Counts
         * 
         * @param type $url
         * @return type
         */
        public function googlePlus_counts($url = '') {
            $url = urlencode($url);
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            $curl_results = curl_exec($curl);
            curl_close($curl);
            $json = json_decode($curl_results, true);
            return intval($json[0]['result']['metadata']['globalCounts']['count']);
        }

        /**
         * Facebook
         * 
         * https://www.facebook.com/sharer.php?u={url}&t={title}
         * https://www.facebook.com/dialog/share?app_id={app_id}&display=page&href={url}&redirect_uri={redirect_url}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function facebook($url = '', $title = '') {
            $newtitle = $this->wp_encoding_string($title);
            $facebook_option = get_option('melibu_plugin_get_social_options');
            $newurl = urlencode($url);
            $query = '?u=' . $newurl . '&t=' . $newtitle . '&src=sp' . (isset($facebook_option['params_facebook_quote']) && $facebook_option['params_facebook_quote'] != '' ? '&quote=' . $facebook_option['params_facebook_quote'] : '');
            return 'http://facebook.com/sharer/sharer.php' . $this->wp_encoding_url($query);
        }

        /**
         * Facebook Counts
         * 
         * @param type $url
         * @return type
         */
        public function facebook_counts($url = '') {
            $newurl = urlencode($url);
            $SBstring = file_get_contents('http://api.facebook.com/restserver.php?method=links.getStats&urls=' . $newurl);
            $SBarray = json_decode($SBstring, true);
            return intval($SBarray[$newurl]['shares']);
        }

        /**
         * Twitter
         * 
         * https://twitter.com/intent/tweet?url={url}&text={title}&via={via}&hashtags={hashtags}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function twitter($url = '', $title = '') {
            $twitter_option = get_option('melibu_plugin_get_social_options');
            $newtitle = $this->wp_encoding_string($title);
            $newurl = urlencode($url);
            $query = '?url=' . $newurl . (isset($twitter_option['params_twitter_via']) && $twitter_option['params_twitter_via'] != '' ? '&via=' . $twitter_option['params_twitter_via'] : '') . '&text=' . $newtitle . '&source=webclient';
            return 'https://twitter.com/intent/tweet' . $this->wp_encoding_url($query);
        }

        /**
         * * Twitter RE-TWEETS
         *
         * https://twitter.com/intent/tweet?original_referer=' . $string . '&source=tweetbutton&text=' . $string . '&url=<?php the_permalink();
         * 
         * @param type $url
         * @return type
         */
        public function twitter_counts($url = '') {
            $return = false;
            $newurl = urlencode($url);
            $SBstring = file_get_contents('https://cdn.syndication.twitter.com/widgets/tweetbutton/count.json?url=' . $newurl);
            if ($SBstring === FALSE) {
                
            } else {
                $SBarray = json_decode($SBstring, true);
                $return = intval($SBarray['count']);
            }
            return $return;
        }

        /**
         * Xing
         * 
         * https://www.xing.com/spi/shares/new?url=
         * 
         * @param type $url
         * @return type
         */
        public function xing($url = '') {
            $xing_option = get_option('melibu_plugin_get_social_options');
            $newurl = urlencode($url);
            $query = '?url=' . $newurl . (isset($xing_option['params_xing_follow']) && $xing_option['params_xing_follow'] != '' ? '&follow_url=' . $xing_option['params_xing_follow'] : '');
            return 'https://xing.com/spi/shares/new' . $this->wp_encoding_url($query);
        }

        /**
         * LinkedIn
         * 
         * https://www.linkedin.com/shareArticle?mini=true&url=
         * https://www.linkedin.com/shareArticle?url={url}&title={title}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function linkedin($url = '', $title = '') {
            $newtitle = $this->wp_encoding_string($title);
            $newurl = urlencode($url);
            $query = '?url=' . $newurl . '&title=' . $newtitle . '&mini=true';
            return 'https://linkedin.com/shareArticle' . $this->wp_encoding_url($query);
        }

        /**
         * tumblr
         * 
         * https://www.tumblr.com/widgets/share/tool?canonicalUrl={url}&title={title}&caption={desc}
         * 
         * @param type $url
         * @param type $title
         * @param type $description
         * @return type
         */
        public function tumblr($url = '', $title = '', $description = '') {
            $newtitle = $this->wp_encoding_string(substr($title, 0, 200));
            $newdescription = $this->wp_encoding_string($this->wp_get_text($description));
            $newurl = urlencode($url);
            $query = '?url=' . $newurl . '&title=' . $newtitle . '&content=' . $newdescription;
            return 'http://www.tumblr.com/share/link' . $this->wp_encoding_url($query);
        }

        /**
         * Reddit
         * 
         * https://reddit.com/submit?url={url}&title={title}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function reddit($url = '', $title = '') {
            $newurl = urlencode($url);
            $newtitle = $this->wp_encoding_string($title);
            $query = '?url=' . $newurl . '&title=' . $newtitle;
            return 'https://reddit.com/submit' . $this->wp_encoding_url($query);
        }

        /**
         * Digg
         * 
         * http://digg.com/submit?url={url}&title={title}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function digg($url = '', $title = '') {
            $newurl = urlencode($url);
            $newtitle = $this->wp_encoding_string($title);
            $query = '?url=' . $newurl . '&title=' . $newtitle;
            return 'http://digg.com/submit' . $this->wp_encoding_url($query);
        }

        /**
         * Delicious
         * 
         * https://delicious.com/save?v=5&provider={provider}&noui&jump=close&url={url}&title={title}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function delicious($url = '', $title = '') {
            $newurl = urlencode($url);
            $newtitle = $this->wp_encoding_string($title);
            $query = '?v=5&url=' . $newurl . '&provider=' . urlencode(get_bloginfo('name')) . '&jump=close&title=' . $newtitle;
            return 'https://delicious.com/save' . $this->wp_encoding_url($query);
        }

        /**
         * StumbleUpon
         * 
         * http://www.stumbleupon.com/submit?url={url}&title={title}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function stumbleupon($url = '', $title = '') {
            $newurl = urlencode($url);
            $newtitle = $this->wp_encoding_string($title);
            $query = '?url=' . $newurl . '&title=' . $newtitle;
            return 'http://stumbleupon.com/submit' . $this->wp_encoding_url($query);
        }

        /**
         * getpocket
         * 
         * https://getpocket.com/save?url=[post-url]&title=[post-title]
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function getpocket($url = '', $title = '') {
            $newurl = urlencode($url);
            $newtitle = $this->wp_encoding_string($title);
            $query = '?url=' . $newurl . '&title=' . $newtitle;
            return 'https://getpocket.com/save' . $this->wp_encoding_url($query);
        }

        /**
         * buffer
         * 
         * https://buffer.com/add?text={title}&url={url}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function buffer($url = '', $title = '') {
            $newtitle = $this->wp_encoding_string($title);
            $query = '?url=' . $url . '&text=' . $newtitle;
            return 'http://buffer.com/add' . $this->wp_encoding_url($query);
        }

        /**
         * blogger
         * 
         * https://blogger.com/blog-this.g?u={url}&n={title}&t={description}
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function blogger($url = '', $title = '', $description = '') {
            $newtitle = $this->wp_encoding_string($title);
            $newdescription = $this->wp_encoding_string($this->wp_get_text($description));
            $query = '?u=' . $url . '&n=' . $newtitle . '&t=' . $newdescription;
            return 'https://blogger.com/blog-this.g' . $this->wp_encoding_url($query);
        }

        /**
         * Pinterest
         * 
         * https://pinterest.com/pin/create/bookmarklet/?media={img}&url={url}&is_video={is_video}&description={title}
         * 
         * @param type $url
         * @param type $title
         * @return string
         */
        public function pinterest($url = '', $title = '') {

            $return = false;
            $newtitle = $this->wp_encoding_string($title);
            if (has_post_thumbnail()) {
                if (get_the_post_thumbnail_url()) {
                    $imgurl = urlencode(get_the_post_thumbnail_url());
                } else {
                    $imgurl = wp_get_attachment_url(get_post_thumbnail_id());
                }
                $query = '?url=' . $url . '&media=' . $imgurl . "&description=" . $newtitle;
                $return = 'http://pinterest.com/pin/create/button' . $this->wp_encoding_url($query);
            } else if (get_background_image()) {
                $imgurl = urlencode(wp_get_attachment_url(get_background_image()));
                $query = '?url=' . $url . '&media=' . $imgurl . "&description=" . $newtitle;
                $return = 'http://pinterest.com/pin/create/button' . $this->wp_encoding_url($query);
            }

            return $return;
        }

        /**
         * Whatsapp
         * 
         * @param type $url
         * @return type
         */
        public function whatsapp($url = '') {
            $newurl = urlencode($url);
            $query = '?text=' . __('Very recommendable item:', 'melibuPlugin_social') . $newurl . '&abid=256';
            return 'whatsapp://send' . $this->wp_encoding_url($query);
        }

        /**
         * Mail
         * 
         * @param type $url
         * @param type $title
         * @return type
         */
        public function mail($url = '', $title = '') {
            $newurl = urlencode($url);
            $query = '?body=' . __('Very recommendable item:', 'sharing-social-safe') . ' ' . $newurl . '&subject=' . $this->wp_encoding_string($title);
            return 'mailto:' . $this->wp_encoding_url($query);
        }

        /**
         * Print
         * 
         * @return string
         */
        public function printer() {
            return '#';
        }

        /**
         * Decodes the WP Encoding
         * 
         * @param type $string
         * @return type
         */
        private function wp_encoding_string($string) {
            return esc_html(
                    urlencode(
                            trim(
                                    html_entity_decode($string, ENT_COMPAT, 'UTF-8')
                            )
                    )
            );
        }

        /**
         * Decodes the WP Encoding
         * 
         * @param type $url
         * @return type
         */
        private function wp_encoding_url($url) {
            return urlencode(
                    trim($url)
            );
        }

        /**
         * Decodes the WP Encoding
         * 
         * @param type $description
         * @return type
         */
        private function wp_get_text($description) {
            return esc_html(
                    strip_shortcodes(
                            strip_tags(
                                    wp_strip_all_tags(
                                            str_replace(array("\n", "\r", "\t"), ' ', substr($description, 0, 256))
                                    )
                            )
                    )
            );
        }

    }

}