<?php
/**
 * MELIBU SHARE OVERVIEW
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.5
 */
if (!class_exists('MELIBU_PLUGIN_SHARE_CLICKS')) {

    class MELIBU_PLUGIN_SHARE_CLICKS {

        // Attributes
        private $DB = null;
        private $page = 0;
        private $link = '#';
        private $deleteID = '';
        private $showpager = 5;
        private $showlist = 'all';

        /**
         * Constructor
         * 
         * @global type $wpdb
         */
        public function __construct() {

            global $wpdb;
            $this->DB = $wpdb;
            $this->actionHandler();

            $host = (isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : $_SERVER["SERVER_NAME"]);
            $request = (isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : '');

            $this->link = $this->_is_Secure() . $host . $request;
        }

        /**
         * 
         * @return type
         */
        public function _is_Secure() {
            $isSecure = false;
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $isSecure = true;
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
                $isSecure = true;
            }
            return $isSecure ? 'https://' : 'http://';
        }

        /**
         * Actionhandler
         * 
         */
        private function actionHandler() {

            $pager = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
            if ($pager) {
                $this->page = (int) intval(trim(htmlentities($pager, ENT_QUOTES, "UTF-8")));
            }

            if (isset($_POST['mb_select_social_shows'])) {
                $_SESSION['mb_show_socials'] = (int) filter_input(INPUT_POST, 'mb_select_social_shows', FILTER_SANITIZE_NUMBER_INT);
            }

            if (!isset($_SESSION['mb_show_socials'])) {
                $this->showpager = 5;
            } else {
                $this->showpager = $_SESSION['mb_show_socials'];
            }

            if (isset($_POST['mb-plugin-sss-showlist'])) {
                $_SESSION['mb-plugin-sss-showlist-opt'] = (string) filter_input(INPUT_POST, 'mb-plugin-sss-showlist', FILTER_SANITIZE_STRING);
            }

            if (!isset($_SESSION['mb-plugin-sss-showlist-opt'])) {
                $this->showlist = 'all';
            } else {
                $this->showlist = $_SESSION['mb-plugin-sss-showlist-opt'];
            }

            $mb_delete = filter_input(INPUT_POST, 'mb_delete_social_stat', FILTER_SANITIZE_NUMBER_INT);
            if ($mb_delete) {
                $this->deleteID = (int) intval(trim(htmlentities($mb_delete, ENT_QUOTES, "UTF-8")));
                $this->delete();
            }
        }

        /**
         * Pagination
         * 
         * @param type $pages
         * @param type $color
         * @return type
         */
        public function browse($pages = "1") {

            $total = $this->total();
            $sites = ceil($total / $this->showpager);
            $links = array();

            if ($this->page == 0) {
                $go = 1;
            } else if ($this->page <= 0 || $this->page > $sites) {
                $go = 1;
            } else {
                $go = $this->page;
            }

            if (( $go - $pages ) < 1) {
                $davor = $go - 1;
            } else {
                $davor = $pages;
            }

            if (( $go + $pages ) > $sites) {
                $danach = $sites - $go;
            } else {
                $danach = $pages;
            }

            $off = ( $go - $davor );

            if ($go - $davor > 1) {
                $first = 1;
                $links[] = "<li>"
                        . '<form action="' . esc_url($this->link . '&p=' . $first) . '" method="post">'
                        . '<input name="st_melibuPlugin_list_item" type="hidden" value="4">'
                        . '<p><button type="submit" class="mb-btn">&laquo; ' . __('First', 'sharing-social-safe') . ' </button></p>'
                        . '</form>'
                        . "</li>";
            }

            if ($go != 1) {
                $prev = $go - 1;
                $links[] = "<li>"
                        . '<form action="' . esc_url($this->link . '&p=' . $prev) . '" method="post">'
                        . '<input name="st_melibuPlugin_list_item" type="hidden" value="4">'
                        . '<p><button type="submit" class="mb-btn">&laquo; ' . __('Back', 'sharing-social-safe') . ' </button></p>'
                        . '</form>'
                        . "</li>";
            }

            for ($i = $off; $i <= ( $go + $danach ); $i++) {
                if ($i != $go) {
                    $links[] = "<li>"
                            . '<form action="' . esc_url($this->link . '&p=' . $i) . '" method="post">'
                            . '<input name="st_melibuPlugin_list_item" type="hidden" value="4">'
                            . '<p><button type="submit" class="mb-btn">' . $i . '</button></p>'
                            . '</form>'
                            . "</li>";
                } else if ($i == $sites) {
                    $links[] = "<li class='mb-btn active'> "
                            . "[ $i ]"
                            . "</li>";
                } else if ($i == $go) {
                    $links[] = "<li class='mb-btn active'>"
                            . "[ $i ]"
                            . "</li>";
                }
            }

            if ($go != $sites) {
                $next = $go + 1;
                $links[] = "<li>"
                        . '<form action="' . esc_url($this->link . '&p=' . $next) . '" method="post">'
                        . '<input name="st_melibuPlugin_list_item" type="hidden" value="4">'
                        . '<p><button type="submit" class="mb-btn">' . __('Go', 'sharing-social-safe') . ' &raquo;</button></p>'
                        . '</form>'
                        . "</li>";
            }
            if ($sites - $go - $pages > 0) {
                $last = $sites;
                $links[] = "<li>"
                        . '<form action="' . esc_url($this->link . '&p=' . $last) . '" method="post">'
                        . '<input name="st_melibuPlugin_list_item" type="hidden" value="4">'
                        . '<p><button type="submit" class="mb-btn">' . __('Last', 'sharing-social-safe') . ' &raquo;</button></p>'
                        . '</form>'
                        . "</li>";
            }

            $start = ($go - 1) * $this->showpager;
            $link = implode(" ", $links);
            $dbopt = '';
            if ($this->showlist != 'all') {
                $dbopt = "WHERE type='" . esc_sql($this->showlist) . "'";
            }

            $resultPager = $this->DB->get_results("SELECT * FROM " . $this->DB->prefix . "melibu_sss_s " . $dbopt . " ORDER BY time DESC LIMIT " . esc_sql($start) . ", " . esc_sql($this->showpager) . "");
            ?>
            <div class="mb-st-grid-8">
                <span class="dashicons dashicons-share"></span> <span><?php _e('Total Clicks', 'sharing-social-safe'); ?></span> <span class="mb-badge" style="float:right;"><?php echo '(' . $this->get_clicks() . ')'; ?></span> <hr>
                <span class="dashicons dashicons-share-alt"></span> <span><?php _e('Total Shares', 'sharing-social-safe'); ?></span> <span class="mb-badge" style="float:right;"><?php echo '(' . $this->get_clicks_by('share') . ')'; ?></span> <hr>
                <span class="dashicons dashicons-networking"></span> <span><?php _e('Total Follows', 'sharing-social-safe'); ?></span> <span class="mb-badge" style="float:right;"><?php echo '(' . $this->get_clicks_by('follow') . ')'; ?></span>
            </div>
            <div class="mb-st-grid-4">
                <form action="<?php echo esc_url($this->link); ?>" method="post">
                    <input name="st_melibuPlugin_list_item" type="hidden" value="4">
                    <input name="mb_select_social_shows" type="hidden" value="<?php echo esc_html($this->showpager); ?>">
                    <p>
                        <button type="submit" class="mb-btn">
                            <span class="dashicons dashicons-update"></span> 
                            <?php _e('Refresh', 'sharing-social-safe'); ?>
                        </button>
                    </p>
                </form>
            </div>
            <div class="st-clear"></div>
            <hr />
            <?php
            $this->read($resultPager, $go, $sites, $link);
        }

        /**
         * 
         * @param type $resultPager
         * @param type $go
         * @param type $sites
         * @param type $link_string
         */
        private function read($resultPager, $go, $sites, $link_string) {
            global $melibuPluginSSSBitly;
            $melibu_plugin_get_social_bitly = get_option('melibu_plugin_get_social_bitly');
            $melibu_plugin_get_social_bitly_onoff = '';
            if (isset($melibu_plugin_get_social_bitly['onoff']) && !empty($melibu_plugin_get_social_bitly['onoff'])) {
                $melibu_plugin_get_social_bitly_onoff = $melibu_plugin_get_social_bitly['onoff'];
            }
            ?>
            <div class="mb-st-grid-4">
                <form action="<?php echo esc_url($this->link); ?>" method="post">
                    <input name="mb-plugin-tab" type="hidden" value="4">
                    <p>
                        <select name="mb_select_social_shows">
                            <option <?php selected($this->showpager, 1); ?>>1</option>
                            <option <?php selected($this->showpager, 5); ?>>5</option>
                            <option <?php selected($this->showpager, 10); ?>>10</option>
                            <option <?php selected($this->showpager, 25); ?>>25</option>
                            <option <?php selected($this->showpager, 50); ?>>50</option>
                            <option <?php selected($this->showpager, 100); ?>>100</option>
                        </select>
                        <button type="submit" class="mb-btn">
                            <span class="dashicons dashicons-list-view"></span>
                            <?php _e('Show per page', 'sharing-social-safe'); ?>
                        </button>
                    </p>
                </form>
            </div>
            <div class="mb-st-grid-4">
                <form action="<?php echo esc_url($this->link); ?>" method="post">
                    <input name="mb-plugin-tab" type="hidden" value="4">
                    <p>
                        <select name="mb-plugin-sss-showlist">
                            <option value="all" <?php selected($this->showlist, 'all'); ?>><?php _e('All', 'sharing-social-safe'); ?></option>
                            <option value="share" <?php selected($this->showlist, 'share'); ?>><?php _e('Shares', 'sharing-social-safe'); ?></option>
                            <option value="follow" <?php selected($this->showlist, 'follow'); ?>><?php _e('Follow', 'sharing-social-safe'); ?></option>
                        </select>
                        <button type="submit" class="mb-btn">
                            <span class="dashicons dashicons-list-view"></span>
                            <?php _e('Show', 'sharing-social-safe'); ?>
                        </button>
                    </p>
                </form>
            </div>
            <div class="mb-st-grid-4">
                <p>
                    <a title="By Force92i (Own work) [Public domain], via Wikimedia Commons" href="https://commons.wikimedia.org/wiki/File%3ABit.ly_Logo.png"><img width="46" alt="Bit.ly Logo" src="https://upload.wikimedia.org/wikipedia/commons/4/46/Bit.ly_Logo.png"/></a><br />
                    <?php _e('Activate now with', 'sharing-social-safe'); ?> OAuth.<br />
                </p>
            </div>
            <div class="st-clear"></div>
            <?php
            if (!$resultPager) {
                ?><hr /><?php
                echo ucfirst($this->showlist) . ': <br>';
                _e('You have no clicks', 'sharing-social-safe') . '.';
                return;
            }
            ?>
            <table class="wp-list-table widefat fixed striped media">
                <tr>
                    <th><?php _e('Plattform', 'sharing-social-safe'); ?></th>
                    <th><?php _e('User Agent', 'sharing-social-safe'); ?></th>
                    <!--<th><?php // _e('IP', 'sharing-social-safe');                           ?></th>-->
                    <th><?php _e('Page Url', 'sharing-social-safe'); ?></th>
                    <th><?php _e('Page bitly Url', 'sharing-social-safe'); ?></th>
                    <th><?php _e('Share Url', 'sharing-social-safe'); ?></th>
                    <th><?php _e('Type', 'sharing-social-safe'); ?></th>
                    <th><?php _e('Last Click', 'sharing-social-safe'); ?></th>
                    <th><?php _e('Edit', 'sharing-social-safe'); ?></th>
                </tr>
                <?php foreach ($resultPager as $social) : ?>
                    <tr class="mb-sharing-social-safe">
                        <td>
                            <span style="padding:2px 7px;" class="<?php echo esc_attr($social->social) . 's'; ?>">
                                <?php echo isset($social->social) && $social->social ? esc_html($social->social) : ''; ?>
                            </span>
                        </td>
                        <td><?php echo isset($social->agent) && $social->agent ? $social->agent : ''; ?></td>
                        <!--<td><?php // echo isset($social->ip) && $social->ip ? $social->ip : '';                           ?></td>-->
                        <td><?php echo isset($social->perma) && $social->perma ? '<a href="' . esc_url($social->perma) . '" target="_blank">' . esc_html($social->perma) . '</a>' : ''; ?></td>
                        <td><?php
                            global $MELIBU_PLUGIN_OPTIONS_02;
                            $bitly = $MELIBU_PLUGIN_OPTIONS_02->bitly();

                            if ('on' == $bitly['onoff']) {
                                $mb_plugin_bitly = $melibuPluginSSSBitly->user_link_lookup($social->perma);
                                if (isset($social->type) && $social->type == 'share') {
                                    if (isset($mb_plugin_bitly['bitly_full']->status_code) && 200 == $mb_plugin_bitly['bitly_full']->status_code) {
                                        echo '<small>' . __('bitly link found for this Site URL', 'sharing-social-safe') . '</small><br />';
                                        echo esc_url($mb_plugin_bitly['bitly_perma']) . '<br /><br />';

                                        echo '<span class="mb-badge">' . esc_url($mb_plugin_bitly['bitly_link']) . '</span>';
                                    } else {
                                        ?><small><?php _e('No bitly found, activate for check links', 'sharing-social-safe'); ?></small><?php
                                    }
                                } else {
                                    ?><small><?php _e('For follows no bitly support', 'sharing-social-safe'); ?></small><?php
                                }
                            } else {
                                ?><small><?php _e('No bitly found, activate for check links', 'sharing-social-safe'); ?></small><?php
                            }
                            ?>
                        </td>
                        <td><?php echo isset($social->page) && $social->page ? esc_url($social->page) : ''; ?></td>
                        <td>
                            <?php
                            if (isset($social->type) && $social->type == 'share') {
                                ?><span class="mb-badge-share"><span class="dashicons dashicons-share-alt"></span> <?php echo esc_html($social->type); ?></span><?php
                            } else if (isset($social->type) && $social->type == 'follow' || $social->type == 'subscribe') {
                                ?><span class="mb-badge-follow"><span class="dashicons dashicons-networking"></span> <?php echo esc_html($social->type); ?></span><?php
                            }
                            ?>
                        </td>
                        <td><span class="dashicons dashicons-clock"></span> <?php echo isset($social->time) && $social->time ? date_i18n(get_option('date_format') . ' ' . get_option('time_format'), esc_html($social->time)) : '#'; ?></td>
                        <td>
                            <form action="<?php echo isset($social->link) && $social->link ? esc_url($social->link) : '#'; ?>" method="post">
                                <input name="mb-plugin-tab" type="hidden" value="4">
                                <input name="mb_select_social_shows" type="hidden" value="<?php echo esc_html($this->showpager); ?>">
                                <input name="mb_delete_social_stat" type="hidden" value="<?php echo isset($social->id) && $social->id ? esc_html($social->id) : '#'; ?>">
                                <button type="submit" class="mb-btn">
                                    <span class="dashicons dashicons-trash"></span> 
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <section class="mb-st-pagechanger">
                <div class="mb-st-pager">
                    <div class="mb-st-paged">
                        <?php _e('Page', 'sharing-social-safe'); ?> <?php echo $go; ?> <?php _e('from', 'sharing-social-safe'); ?> <?php echo $sites; ?>
                    </div>
                    <ul>
                        <?php echo $link_string; ?>
                    </ul>
                </div>
            </section>
            <?php
        }

        /**
         * Delete
         * 
         */
        private function delete() {

            $this->DB->delete($this->DB->prefix . "melibu_sss_s", array('id' => $this->deleteID));
        }

        /**
         * Total
         * 
         */
        private function total() {

            $result = $this->DB->get_results("SELECT * FROM " . $this->DB->prefix . "melibu_sss_s");
            return count($result);
        }

        /**
         * Total Clicks
         * 
         */
        private function get_clicks() {

            $resultSumCounts = 0;
            $resultSumCount = $this->DB->get_results("SELECT SUM(clicks) AS total FROM " . $this->DB->prefix . "melibu_sss_s");
            if ($resultSumCount[0]->total != NULL) {
                $resultSumCounts = $resultSumCount[0]->total;
            }
            return $resultSumCounts;
        }

        /**
         * Total Clicks
         * 
         */
        private function get_clicks_by($where) {

            $resultSumCounts = 0;
            $resultSumCount = $this->DB->get_results("SELECT SUM(clicks) AS total FROM " . $this->DB->prefix . "melibu_sss_s WHERE type='" . esc_sql($where) . "'");
            if ($resultSumCount[0]->total != NULL) {
                $resultSumCounts = $resultSumCount[0]->total;
            }
            return $resultSumCounts;
        }

    }

    $MELIBU_PLUGIN_SHARE_CLICKS = new MELIBU_PLUGIN_SHARE_CLICKS(); // Instantiate the plugin class
}
