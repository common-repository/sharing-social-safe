<?php

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
if (!class_exists('MELIBU_PLUGIN_SHARE_ABSTRACT')) {

    abstract class MELIBU_PLUGIN_SHARE_ABSTRACT {

        /**
         * 
         * @global type $wpdb
         * @param type $name
         * @return type
         */
        public function get_by_name($name) {

            global $wpdb;
            $return = false;
            $table_name = $wpdb->prefix . "melibu_sss";
            $result = $wpdb->get_results("SELECT * FROM " . $table_name . " WHERE name='" . esc_sql($name) . "'");
            if ($result) {
                $return = $result[0]->value;
            }
            return $return;
        }

        /**
         * 
         * @global type $wpdb
         * @param type $name
         * @return type
         */
        public function get_by_agent($name) {

            global $wpdb;
            $return = false;
            $table_name = $wpdb->prefix . "melibu_sss_s";
            $result = $wpdb->get_results("SELECT * FROM " . $table_name . " WHERE agent='" . esc_sql($name) . "'");
            if ($result) {
                $return = $result[0]->clicks;
            }
            return $return;
        }

        /**
         * 
         * @param type $check
         * @return type
         */
        public function socialTranslate($check) {

            $return = '';
            $arr = array('small', 'smooth', 'round', 'corner', 'corner-smooth', 'glow', 'glow-dark', 'glow-corner', 'glow-round', 'shining-dark-short', 'special-overlap', 'smooth-dark', 'round-switch');
            if (!in_array($check, $arr)) {
                $return = __('Share', 'sharing-social-safe');
            }
            return $return;
        }

        /**
         * 
         * @param type $url
         * @return type
         */
        public function get_by_url($url) {

            global $wpdb;
            $return = 0;
            $table_name = $wpdb->prefix . "melibu_sss_s";
            $result = $wpdb->get_results("SELECT * FROM " . $table_name . " WHERE type='share'");
            if ($result) {
                foreach ($result as $rest) {

                    $urlmatch = $this->match_url('url', $rest->page);
                    if (trim($url) == trim($urlmatch['match'])) {
                        $return++;
                    }

                    $u = $this->match_url('u', $rest->page);
                    if (trim($url) == trim($u['match'])) {
                        $return++;
                    }

                    $item = $this->match_url('item', $rest->page);
                    if (trim($url) == trim($item['match'])) {
                        $return++;
                    }

                    $et = $this->match_url('et', $rest->page);
                    if (trim($url) == trim($et['match'])) {
                        $return++;
                    }

                    $text = $this->match_url('text', $rest->page);
                    if (trim($url) == trim($text['match'])) {
                        $return++;
                    }
                }
            }
            return $return;
        }

        /**
         * 
         * @param type $url
         * @return type
         */
        public function get_count_by_url($url, $link, $type = 'share') {

            global $wpdb;
            $return = 0;
            $table_name = $wpdb->prefix . "melibu_sss_s";
            $result = $wpdb->get_results("SELECT * FROM " . $table_name . " WHERE perma='" . esc_sql($url) . "' AND type='" . esc_sql($type) . "'");
            if ($result) {
                $return = count($result) + 1;
//                foreach ($result as $rest) {
//                    if (trim($url) == trim($rest->perma)) {
//                        $return++;
//                    }
//                }
            }
            return $return;
        }

        /**
         * 
         * @param type $url
         * @return type
         */
        public function get_count_by_social($social, $type = 'share', $perma = '', $link = '') {

            global $wpdb;
            if ($perma == '') {
                $perma = get_the_permalink();
            }
            $return = 0;
            $table_name = $wpdb->prefix . "melibu_sss_s";
            $result = $wpdb->get_results("SELECT * FROM " . $table_name . " WHERE social='" . esc_sql($social) . "' AND type='" . esc_sql($type) . "' AND perma='" . $perma . "'");
            if ($result) {
                $return = count($result);
            }
            return $return;
        }

        /**
         * 
         * @param type $type
         * @param type $shareLink
         * @return type
         */
        public function match_url($type, $shareLink) {

            $arr = array();
            $matches = array();

            switch ($type) {
                case 'url':
                    $regex = '/url=(.*)/';
                    break;
                case 'u':
                    $regex = '/u=(.*)/';
                    break;
                case 'item':
                    $regex = '/' . __('item', 'sharing-social-safe') . ':+\s+(.*)&/';
                    break;
//                case __('Article', 'sharing-social-safe'):
//                    $regex = '/' . __('Article', 'sharing-social-safe') . ':+\s+(.*)&/';
//                    break;
                case 'et':
                    $regex = '/et:+\s+(.*)&/';
                    break;
                case 'text':
                    $regex = '/text=(.*)/';
                    break;
                default:
                    break;
            }

            $arr['match'] = false;

            if ($regex) {
                $arr['status'] = preg_match($regex, $shareLink, $matches);
                if (isset($matches[1]) && !empty($matches[1])) {
                    $arr['match'] = $matches[1];
                }
            }

            return $arr;
        }

        /**
         * 
         * @param type $social
         * @param type $css
         * @param type $title
         * @param type $extra
         * @param type $icon
         * @param type $check
         * @param type $short_url
         * @return string
         */
        public function set_share_btn($social, $css, $extra, $icon, $check, $short_url) {

            $backturn = '';

            $melibu_plugin_get_social_count = get_option('melibu_plugin_get_social_count');
            $melibu_plugin_get_social_count_singlecount = '';
            if (isset($melibu_plugin_get_social_count['singlecount']) && !empty($melibu_plugin_get_social_count['singlecount'])) {
                $melibu_plugin_get_social_count_singlecount = $melibu_plugin_get_social_count['singlecount'];
            }

            $backturn .= '<a rel="popup" title="' . __('Share on', 'sharing-social-safe') . ' ' . $social . '" target="_blank" class="melibu-share-button ' . $css . ' slide" href="' . $this->get_share_button_url($css, $short_url, get_the_title(get_the_ID()), $extra) . '" data-mb-sss-click="share" data-mb-sss-perma="' . get_the_permalink(get_the_ID()) . '">';
            $backturn .= '<span class="melibu-share-button__inner">';
            $backturn .= '<span class="melibu-share-button__shine"></span>';
            $backturn .= '<span class="melibu-share-button__icon">';
            $backturn .= '<i class="fa ' . $icon . '"></i>';
            $backturn .= '</span>';

            if ($melibu_plugin_get_social_count_singlecount == 'on') {
                $backturn .= '<span class="melibu-share-button__count">';
                $backturn .= $this->get_count_by_social(substr($css, 0, -1), 'share');
                $backturn .= '</span>';
            }

            $backturn .= '</span>';
            $backturn .= $this->socialTranslate($check);
            $backturn .= '</a>';

            return $backturn;
        }

        /**
         * 
         * @global type $wpdb
         */
        public function save() {

            global $wpdb;

            if (isset($_POST['save']) && $_POST['save'] == 1) {

                $arr = array();
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                foreach ($_POST as $key => $value) {
                    if ($key != 'save' || $key != 'action' || $key != 'actiontype') {
                        $arr['name'] = htmlentities($key, ENT_QUOTES, "UTF-8");
                        $arr['value'] = htmlentities($value, ENT_QUOTES, "UTF-8");
                    }
                }

                $result = $this->get_by_name($arr['name']);
                $table_name = $wpdb->prefix . "melibu_sss";

                if ($result) {
                    $wpdb->update($table_name, array(
                        'value' => $arr['value'],
                        'time' => strtotime(get_date_from_gmt(date('Y-m-d H:i:s', time()), get_option('date_format') . ' ' . get_option('time_format')))), // UPDATE 
                            array('name' => $arr['name']) // WHERE
                    );
                } else {
                    $wpdb->insert($table_name, array(
                        'name' => $arr['name'],
                        'value' => $arr['value'],
                        'time' => strtotime(get_date_from_gmt(date('Y-m-d H:i:s', time()), get_option('date_format') . ' ' . get_option('time_format')))
                    ));
                }
            }
        }

        /**
         * Save click on AJAX request, check class.MelibuFrontend.php
         * @global type $wpdb
         * @global type $melibuPluginHelper
         */
        public function save_click() {

            global $wpdb, $melibuPluginSSSBitly;

            // Our fill array for output
            $arr = array();

            // If ajax post, click key exists and is 1
            if (isset($_POST['click']) && $_POST['click'] == 1) {

                // Fill for stats in backend and frontend count
                $arr['agent'] = 'No available';
                $arr['agent'] = (string) trim(urldecode(filter_input(INPUT_POST, 'agent')));
                if (!$arr['agent']) {
                    $arr['agent'] = (string) trim(filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'));
                }
//                $arr['ip'] = $melibuPluginHelper->get_IP();
                $arr['social'] = (string) trim(filter_input(INPUT_POST, 'social'));
                $arr['link'] = (string) trim(urldecode(filter_input(INPUT_POST, 'link')));
                $arr['type'] = (string) trim(filter_input(INPUT_POST, 'type'));
                $arr['perma'] = (string) trim(urldecode(filter_input(INPUT_POST, 'perma')));

                $return = $melibuPluginSSSBitly->user_link_lookup($arr['perma']);

                $arr['count'] = $this->get_count_by_url($return['bitly_perma'], $arr['link'], $arr['type']);

                $arr['bitly'] = $return['bitly_perma'];

                $arr['shared'] = $this->get_count_by_social($arr['social'], $arr['type'], $arr['perma'], $arr['link']);
                
                $time = strtotime(get_date_from_gmt(date('Y-m-d H:i:s', time()), get_option('date_format') . ' ' . get_option('time_format')));
                
//                $data = array(
//                    'agent' => $arr['agent'],
//                    'social' => $arr['social'],
//                    'page' => $arr['link'],
//                    'clicks' => "1",
//                    'type' => $arr['type'],
//                    'time' => $time,
//                    'ip' => 'x',
//                    'perma' => $arr['perma']
//                );

//                $format = array(
//                    '%s',
//                    '%s',
//                    '%s',
//                    '%d',
//                    '%s',
//                    '%d',
//                    '%s',
//                    '%s'
//                );

//                $result = $wpdb->insert($wpdb->prefix . "melibu_sss_s", $data, $format);
                
                $result = $wpdb->query("INSERT INTO `" . $wpdb->prefix . "melibu_sss_s` (`agent`, `social`, `page`, `clicks`, `type`, `time`, `ip`, `perma`) VALUES ('" . $arr['agent'] . "', '" . $arr['social'] . "', '" . $arr['link'] . "', '1', '" . $arr['type'] . "', '" . $time . "', 'x', '" . $arr['perma'] . "')");

                $arr['table'] = $wpdb->prefix . "melibu_sss_s";
                $arr['sql'] = $result;
                $arr['lastsqlerror'] = $wpdb->last_error;
                $arr['lastquery'] = $wpdb->last_query;

                echo json_encode($arr);
            }
        }

    }

}