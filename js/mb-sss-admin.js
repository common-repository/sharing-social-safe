/**
 * MELIBU PLUGIN ADMIN
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
var melibu_plugin_sss_admin = {
    name: 'MeliBu Plugin SSS Admin',
    /**
     * init
     * @returns {undefined}
     */
    init: function () {
        
        if (document.querySelectorAll(".mb_p_sss_save_data")) {
            var data = document.querySelectorAll(".mb_p_sss_save_data");
            for (var i = 0; i < data.length; i++) {
                melibu_plugin_event.addEvent(data[i], "click", melibu_plugin_sss_admin.save);
            }
        }
    },
    /**
     * save
     * @param {type} event
     * @returns {undefined}
     */
    save: function (event) {

        if (event.target.value) {

            var sendParams = 'action=melibu_sss_admin_ajax';
            sendParams += '&actiontype=save';
            sendParams += '&save=1';
            sendParams += '&' + event.target.name + '=' + event.target.value;

            melibu_plugin_ajax.addAjax({
                type: "POST",
                url: melibu_sss_admin_obj.mb_ajax_url + "/wp-admin/admin-ajax.php",
                data: sendParams,
                success: function (requestback) {

                    var get = document.querySelector('.mb-sharing-social-safe > div');
                    get.className = event.target.value;
                    location.href = document.URL;
                }
            });
        }
    }
};

var melibu_plugin_sss_form = {
    name: "MeliBu Plugin Form",
    init: function () {
        var select = document.getElementById('mb-social-select-user-allow');
        melibu_plugin_event.addEvent(select, "change", melibu_plugin_sss_form.change);
    },
    change: function (event) {

        var selected = '';

        if (typeof event === 'string') {
            selected = event;
        } else {
            selected = event.target.value;
        }

        var select2 = document.getElementById('mb-social-select-user-allowed');
        if (selected === 'admin') {
            select2.style.display = 'block';
        } else {
            select2.style.display = 'none';
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {

    melibu_plugin_sss_admin.init();
    melibu_plugin_sss_form.init();
    if (document.getElementById('mb-social-select-user-allow') && document.getElementById('mb-social-select-user-allow').value) {
        melibu_plugin_sss_form.change(document.getElementById('mb-social-select-user-allow').value);
    }
});