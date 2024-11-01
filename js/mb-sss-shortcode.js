/**
 * MELIBU PLUGIN SHORTCODES
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */

jQuery(document).ready(function () {

    if (typeof (tinyMCE) != "undefined") {

        tinymce.create('tinymce.plugins.mbPluginSocial', {
            init: function (ed, url) {

                ed.addButton('mb_plugin_social_button', {
                    title: 'Insert MB Social Share',
                    cmd: 'mb_plugin_social_insert_shortcode',
                    icon: 'share'
                });

                ed.addCommand('mb_plugin_social_insert_shortcode', function () {
                    var return_text = '[wp_mb_plugin_social share="wordpress,googleplus,facebook,twitter,xing,linkedin,tumblr,reddit,digg,delicious,stumbleupon,getpocket,pinterest,whatsapp,mail,print"]';
                    ed.execCommand('mceInsertContent', 0, return_text);
//                    ed.execCommand('mceReplaceContent', false, '<div class="mb-sharing-social-safe"><div class="long"><a rel="popup" class="melibu-share-button wordpresss" href="#"><span class="melibu-share-button__inner"><span class="melibu-share-button__shine"></span><span class="melibu-share-button__icon"><i class="fa fa-wordpress"></i></span></span></a></div></div>');
                });
            },
            createControl: function (n, cm) {
                return null;
            }
        });

        tinymce.PluginManager.add('mb_plugin_social_button', tinymce.plugins.mbPluginSocial);


        tinymce.create('tinymce.plugins.mbPluginSocialFind', {
            init: function (ed, url) {

                ed.addButton('mb_plugin_social_button_find', {
                    title: 'Insert MB Social Follow',
                    cmd: 'mb_plugin_social_find_insert_shortcode',
                    icon: 'share'
                });

                ed.addCommand('mb_plugin_social_find_insert_shortcode', function () {

                    var return_text = '[wp_mb_plugin_social follow="facebook,googleplus,twitter,flickr,pinterest,youtube,github,skype,snapchat,jsfiddle,instagram,soundcloud,xing,linkedin,tumblr,rss"]';
                    ed.execCommand('mceInsertContent', 0, return_text);
                });
            },
            createControl: function (n, cm) {
                return null;
            }
        });

        tinymce.PluginManager.add('mb_plugin_social_button_find', tinymce.plugins.mbPluginSocialFind);

    }
});

