<?php
require_once 'class.MelibuBackendAbstract.php';
/**
 * MELIBU PLUGIN BACKEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.1.5
 */
if (!class_exists('MELIBU_PLUGIN_BACKEND_02')) {

    /**
     * Class
     */
    class MELIBU_PLUGIN_BACKEND_02_MENUS extends MELIBU_PLUGIN_BACKEND_02_ABSTRACT {

        /**
         * Admin Menus
         */
        public function admin_menu() {

            /**
             * Main Menu
             * add_menu_page()
             * https://developer.wordpress.org/reference/functions/add_menu_page/
             */
            add_menu_page('Melabu Sharing Social Safe - ' . __('Short code', 'sharing-social-safe'), // $page_title
                    'MB SSS', // $menu_title
                    'manage_options', // $capability
                    'melibu-plugin-social-admin', // $menu_slug
                    array($this, 'docu'), // $function
                    plugins_url('img/icon-MB-20.png', dirname(__FILE__)) // $icon_url
            );

            /**
             * Sub Menu
             * add_submenu_page() WP Since: 1.5.0
             * https://developer.wordpress.org/reference/functions/add_submenu_page/
             */
            add_submenu_page('melibu-plugin-social-admin', // $parent_slug
                    'Melabu Sharing Social Safe - ' . __('Options', 'sharing-social-safe'), // $page_title
                    __('Options', 'sharing-social-safe'), // $menu_title
                    'manage_options', // $capability
                    'melibu-plugin-social-admin-control-menu-0', // $menu_slug
                    array($this, 'panel') // $function
            );
            
//            add_submenu_page('melibu-plugin-social-admin', // $parent_slug
//                    'MeliBu Sharing Social Safe - ' . __('Design', 'sharing-social-safe'), // $page_title
//                    __('Design', 'sharing-social-safe'), // $menu_title
//                    'manage_options', // $capability
//                    'melibu-plugin-social-admin-control-menu-1', // $menu_slug
//                    array($this, 'design') // $function
//            );

//            add_submenu_page('melibu-plugin-social-admin', // $parent_slug
//                    'MeliBu Sharing Social Safe - ' . __('Stats', 'sharing-social-safe'), // $page_title
//                    __('Statistics', 'sharing-social-safe'), // $menu_title
//                    'manage_options', // $capability
//                    'melibu-plugin-social-admin-control-menu-2', // $menu_slug
//                    array($this, 'stats') // $function
//            );

//            add_submenu_page('melibu-plugin-social-admin', // $parent_slug
//                    'MeliBu Sharing Social Safe - ' . __('Privacy', 'sharing-social-safe'), // $page_title
//                    __('Privacy', 'sharing-social-safe'), // $menu_title
//                    'manage_options', // $capability
//                    'melibu-plugin-social-admin-control-menu-3', // $menu_slug
//                    array($this, 'privacy') // $function
//            );

//            add_submenu_page('melibu-plugin-social-admin', // $parent_slug
//                    'MeliBu Sharing Social Safe - ' . __('Optional', 'sharing-social-safe'), // $page_title
//                    __('Optional', 'sharing-social-safe'), // $menu_title
//                    'manage_options', // $capability
//                    'melibu-plugin-social-admin-control-menu-4', // $menu_slug
//                    array($this, 'optional') // $function
//            );

//            add_submenu_page('melibu-plugin-social-admin', // $parent_slug
//                    'MeliBu Sharing Social Safe - ' . __('Settings', 'sharing-social-safe'), // $page_title
//                    __('Settings', 'sharing-social-safe'), // $menu_title
//                    'manage_options', // $capability
//                    'melibu-plugin-social-admin-control-menu-5', // $menu_slug
//                    array($this, 'settings') // $function
//            );

            add_submenu_page('melibu-plugin-social-admin', // $parent_slug
                    'Melabu Sharing Social Safe - ' . __('About', 'sharing-social-safe'), // $page_title
                    __('About', 'sharing-social-safe'), // $menu_title
                    'manage_options', // $capability
                    'melibu-plugin-social-admin-control-menu-6', // $menu_slug
                    array($this, 'about') // $function
            );
        }

        /**
         * Menu Welcome
         */
        public function docu() {
            require_once MELIBU_PLUGIN_PATH_02 . 'html/docu.php';
        }

        /**
         * Menu panel
         */
        public function panel() {
            require_once MELIBU_PLUGIN_PATH_02 . 'html/panel.php';
        }

//        /**
//         * Menu design
//         */
//        public function design() {
//            require_once MELIBU_PLUGIN_PATH_02 . 'html/design.php';
//        }
//
//        /**
//         * Menu stats
//         */
//        public function stats() {
//            require_once MELIBU_PLUGIN_PATH_02 . 'html/stats.php';
//        }
//
//        /**
//         * Menu privacy
//         */
//        public function privacy() {
//            require_once MELIBU_PLUGIN_PATH_02 . 'html/privacy.php';
//        }
//
//        /**
//         * Menu optional
//         */
//        public function optional() {
//            require_once MELIBU_PLUGIN_PATH_02 . 'html/optional.php';
//        }
//
//        /**
//         * Menu settings
//         */
//        public function settings() {
//            require_once MELIBU_PLUGIN_PATH_02 . 'html/settings.php';
//        }

        /**
         * Menu About
         */
        public function about() {
            require_once MELIBU_PLUGIN_PATH_02 . 'html/about.php';
        }
    }

}
