/**
 * MELIBU PLUGIN CLICKS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
var melibu_plugin_social_oauth = {
    name: 'MeliBu Plugin SSS oauth',
    oauth: document.querySelector(".mb-plugin-sss-bitly-oauth"),
    oauthbody: document.querySelector(".mb-plugin-sss-bitly-oauth-dialog"),
    /**
     * Killz the WP AJAX zero
     * @param {type} request
     * @returns {String|melibu_plugin_download.killZero.killed}
     */
    killZero: function (request) {
        var killed = '';
        if (request.substr(request.length - 1) === '0') {
            killed = request.substring(0, request.length - 1); // Clean zero on last -> }0 this gives a error 
        } else {
            killed = request;
        }
        return killed;
    },
    /**
     * 
     * @returns {undefined}
     */
    setBitlyOauth: function () {

        if (document.getElementsByClassName('mb-plugin-sss-bitly-oauth-button')) {
            var oauth = document.getElementsByClassName('mb-plugin-sss-bitly-oauth-button');
            for (var i = 0; i < oauth.length; i++) {
                melibu_plugin_event.addEvent(oauth[i], 'click', melibu_plugin_social_oauth.openOauth);
                melibu_plugin_event.addEvent(oauth[i], 'contextmenu', melibu_plugin_social_oauth.openOauth);
            }
        }
    },
    /**
     * 
     * @returns {undefined}
     */
    setOAuthClicks: function () {

        if (document.querySelectorAll('.mb-plugin-sss-bitly-oauth-submit')) {
            var send = document.querySelectorAll('.mb-plugin-sss-bitly-oauth-submit');
            for (var i = 0; i < send.length; i++) {
                melibu_plugin_event.addEvent(send[i], 'click', melibu_plugin_social_oauth.click);
                melibu_plugin_event.addEvent(send[i], 'contextmenu', melibu_plugin_social_oauth.click);
            }
        }
    },
    /**
     * 
     * @returns {undefined}
     */
    setCancel: function () {

        if (document.querySelectorAll('.mb-plugin-sss-bitly-oauth-abort')) {
            var abort = document.querySelectorAll('.mb-plugin-sss-bitly-oauth-abort');
            for (var x = 0; x < abort.length; x++) {
                melibu_plugin_event.addEvent(abort[x], 'click', melibu_plugin_social_oauth.cancel);
            }
        }
    },
    /**
     * 
     * @param {type} e
     * @returns {Boolean}
     */
    click: function (e) {

        e.preventDefault();

        // Set send params
        var sendParams = {
            action: 'melibu_sss_admin_ajax', // WP AJAX
            actiontype: 'oauth',
            oauth: 1
        };

        var arr = [];

        document.querySelector('.mb-plugin-sss-bitly-oauth-load').innerHTML = '<img src="' + melibu_sss_admin_obj.mb_ajax_url + '/wp-content/plugins/sharing-social-safe/img/loading.gif" alt="Loading">';

        var username = document.getElementById('mb_plugin_get_social_bitly_login').value;
        var password = document.getElementById('mb_plugin_get_social_bitly_password').value;

        if (username) {
            sendParams.username = username;
        } else {
            arr.push('Please insert your Username');
        }

        if (password) {
            sendParams.password = encodeURIComponent(document.getElementById('mb_plugin_get_social_bitly_password').value);
        } else {
            arr.push('Please insert your password');
        }

        if (typeof arr !== 'undefined' && arr.length > 0) {
            document.querySelector('.mb-plugin-sss-bitly-oauth-errors').innerHTML = '';
            for (var i = 0; i < arr.length; i++) {
                document.querySelector('.mb-plugin-sss-bitly-oauth-errors').innerHTML += arr[i] + '<br />';
            }
            document.querySelector('.mb-plugin-sss-bitly-oauth-load').innerHTML = '';    
        }

        if (sendParams.username && sendParams.password) {
            
            document.querySelector('.mb-plugin-sss-bitly-oauth-load').innerHTML = '<img src="' + melibu_sss_admin_obj.mb_ajax_url + '/wp-content/plugins/sharing-social-safe/img/loading.gif" alt="Loading">';

            // Send data
            melibu_plugin_ajax.addAjax({
                type: "POST",
                url: melibu_sss_admin_obj.mb_ajax_url + "/wp-admin/admin-ajax.php",
                data: sendParams,
                success: function (req) {
                    var fixer = melibu_plugin_social_oauth.killZero(req); // fix zero
                    document.querySelector('.mb-plugin-sss-bitly-oauth-load').innerHTML = '';
                    var reqJson = '';
                    try {
                        reqJson = JSON.parse(fixer); // parse from string to object
                    } catch (e) {
                        reqJson = '';
                    }
                    if (reqJson && reqJson.access_token !== 'INVALID_LOGIN') {
                        document.querySelector('.mb-plugin-sss-bitly-oauth-errors').innerHTML = 'Connected<br />';
                        window.location.href = melibu_sss_admin_obj.mb_ajax_url + '/wp-admin/admin.php?page=melibu-plugin-social-admin-control-menu-5';
                    } else {
                        document.querySelector('.mb-plugin-sss-bitly-oauth-errors').innerHTML = '';
                        document.querySelector('.mb-plugin-sss-bitly-oauth-errors').innerHTML = 'Invalid Login<br />';
                    }
                },
                error: function (errorThrown) {
                    alert(errorThrown);
                }
            });
        }

        return false;
    },
    /**
     * 
     * @param {type} e
     * @returns {Boolean}
     */
    openOauth: function (e) {

        e.preventDefault(); // Deactivate link
        if (melibu_plugin_social_oauth.oauthbody) {
            melibu_plugin_social_oauth.oauthbody.style.top = '10%';
            melibu_plugin_social_oauth.oauth.style.visibility = 'visible';
        }
        return false;
    },
    /**
     * 
     * @returns {Boolean}
     */
    cancel: function () {

        if (melibu_plugin_social_oauth.oauthbody) {
            melibu_plugin_social_oauth.oauthbody.style.top = '-50%';
            melibu_plugin_social_oauth.oauth.style.visibility = 'hidden';
        }
        return false;
    }
};

document.addEventListener('DOMContentLoaded', function () {

    melibu_plugin_social_oauth.setBitlyOauth();
    melibu_plugin_social_oauth.setOAuthClicks();
    melibu_plugin_social_oauth.setCancel();
});