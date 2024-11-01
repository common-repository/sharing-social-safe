<?php
/*
  Plugin Name: Melabu WP Sharing Social Safe
  Plugin URI:  https://www.tnado.com/wordpress-plugins-by-tnado/
  Description: This Melabu WP Sharing Social Safe plugin was designed so that you can warrant the embedding in social media in a safer way for you and your users. The security of personal data is growing daily on priority and the laws are being adapted to prevent abuse of data. With this plugin, you and your users are on the safe side. Rate this plugin <a href="https://wordpress.org/support/view/plugin-reviews/download-counter-button">MeliBu WP Sharing Social Safe</a> we welcome any support.
  Version:     1.7.1.2
  Author:      Samet Tarim aka prod3v3loper
  Author2:     Volkan Tarim
  Author URI:  https://www.tnado.com/author/prod3v3loper/
  Author2 URI: https://www.tnado.com/author/volly/
  Text Domain: sharing-social-safe
  Domain Path: /languages/
  License:     GPLv2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html

  Melabu WP Sharing Social Safe is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.

  Melabu WP Sharing Social Safe is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with Melabu WP Sharing Social Safe. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

define('MAA_SSS_02_DEV', 'Samet Tarim');
define('MAA_SSS_02_DEV_URL', 'https://www.tnado.com/author/prod3v3loper/');
define('MAA_SSS_02_DEV_WP_URL', 'https://profiles.wordpress.org/prodeveloper/');
define('MAA_SSS_PLUGIN_02_WP_URL', 'https://wordpress.org/plugins/sharing-social-safe/');

// SECURE SCRIPT ///////////////////////////////////////////////////////////////

if (!defined('ABSPATH')) {
    exit;
}

// DEFINE FULLPATH /////////////////////////////////////////////////////////////

if (!defined('MELIBU_PLUGIN_PATH_02')) {
    define('MELIBU_PLUGIN_PATH_02', plugin_dir_path(__FILE__));
}

if (!defined('MELIBU_PLUGIN_URL_02')) {
    define('MELIBU_PLUGIN_URL_02', plugin_dir_url(__FILE__));
}

// DEFINE GLOBALS //////////////////////////////////////////////////////////////

global $MELIBU_PLUGIN_BACKEND_02, $MELABU_PLUGIN_DATA_02;

// HOLD PLUGIN DATA ////////////////////////////////////////////////////////////

if (!function_exists('get_plugin_data')) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

$MELABU_PLUGIN_DATA_02 = get_plugin_data(MELIBU_PLUGIN_PATH_02 . 'sharing-social-safe.php', $markup = true, $translate = true);

// HOLD PLUGIN DATA ////////////////////////////////////////////////////////////

// Require functions
foreach (glob(MELIBU_PLUGIN_PATH_02 . "functions/*.php") as $mb_plugin_sss_functions) {
    require_once $mb_plugin_sss_functions;
}

// Require Classes
foreach (glob(MELIBU_PLUGIN_PATH_02 . "classes/*.php") as $mb_plugin_sss_classes) {
    require_once $mb_plugin_sss_classes;
}

// Check Admin
if (is_admin()) {

    add_filter('extra_plugin_headers', 'add_extra_headers');

    function add_extra_headers() {
        return array('Author2');
    }

    add_filter('plugin_row_meta', 'filter_authors_row_meta', 1, 4);

    function filter_authors_row_meta($plugin_meta, $plugin_file, $plugin_data, $status) {

        if (empty($plugin_data['Author'])) {
            return $plugin_meta;
        }

        if (!empty($plugin_data['Author2'])) {
            $plugin_meta[1] = $plugin_meta[1] . ', ' . $plugin_data['Author2'];
        }

        return $plugin_meta;
    }

    // Require Backend Class
    require_once MELIBU_PLUGIN_PATH_02 . 'classes/pager/class.MelibuClicks.php';

    // Check if class
    if (class_exists('MELIBU_PLUGIN_BACKEND_02')) {

        $MELIBU_PLUGIN_BACKEND_02 = new MELIBU_PLUGIN_BACKEND_02(); // Instantiate the plugin class
        // Installation and uninstallation hooks
        register_activation_hook(__FILE__, array('MELIBU_PLUGIN_BACKEND_02', 'activate'));
        register_deactivation_hook(__FILE__, array('MELIBU_PLUGIN_BACKEND_02', 'deactivate'));
        register_uninstall_hook(__FILE__, array('MELIBU_PLUGIN_BACKEND_02', 'uninstall'));
    }

    // Add a link to the settings page onto the plugin page
    if (isset($MELIBU_PLUGIN_BACKEND_02)) {

        // Add the settings link to the plugins page
        function melibu_plugin_settings_02_link($links) {

            $settings_link = '<a href="admin.php?page=melibu-plugin-social-admin-control-menu-0">' . __('Options', 'sharing-social-safe') . '</a>';
            array_unshift($links, $settings_link);
            return $links;
        }

        $plugin = plugin_basename(__FILE__);
        add_filter("plugin_action_links_$plugin", 'melibu_plugin_settings_02_link');
    }
}