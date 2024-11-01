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
var melibu_plugin_social = {
    name: 'MeliBu Plugin SSS',
    modal: document.querySelector(".melibu-social-modal"),
    dialog: document.querySelector(".melibu-social-modal > .melibu-social-modal__dialog"),
    /**
     * 
     * @returns {undefined}
     */
    init: function () {

        // ALL CLICKS ON BUTTON
        if (document.getElementsByClassName('melibu-share-button')) {
            var buttons = document.getElementsByClassName('melibu-share-button');
            for (var i = 0; i < buttons.length; i++) {
                melibu_plugin_event.addEvent(buttons[i], 'click', melibu_plugin_social.click);
                melibu_plugin_event.addEvent(buttons[i], 'contextmenu', melibu_plugin_social.click);
            }
        }
        // CONTENT MODAL AND PRINT
        if (document.querySelectorAll('.melibu-share-button-link')) {
            var modalClicker = document.querySelectorAll('.melibu-share-button-link');
            for (var j = 0; j < modalClicker.length; j++) {
                melibu_plugin_event.addEvent(modalClicker[j], 'click', melibu_plugin_social.modalClick);
                melibu_plugin_event.addEvent(modalClicker[j], 'contextmenu', melibu_plugin_social.modalClick);
            }
        }
        // MODAL CANCEL
        if (document.querySelectorAll('.melibu-social-modal .melibu-social-modal__footer__abort')) {
            var abort = document.querySelectorAll('.melibu-social-modal .melibu-social-modal__footer__abort');
            for (var x = 0; x < abort.length; x++) {
                melibu_plugin_event.addEvent(abort[x], 'click', melibu_plugin_social.cancel);
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
            action: 'melibu_sss_ajax', // WP AJAX
            actiontype: 'click',
            click: 1
        };

        // Agent
        sendParams.agent = encodeURIComponent(navigator.userAgent);

        // if target
        if (e.target.href) {

            sendParams.type = e.target.getAttribute('data-mb-sss-click');
            sendParams.perma = encodeURI(e.target.getAttribute('data-mb-sss-perma'));
            sendParams.link = decodeURI(e.target.href); // Link
            var social = e.target.classList[1];
            sendParams.social = social.substr(0, (social.length - 1)); // Clean social

        }
        // or currentTarget
        else if (e.currentTarget.href) {

            sendParams.type = e.currentTarget.getAttribute('data-mb-sss-click');
            sendParams.perma = encodeURI(e.currentTarget.getAttribute('data-mb-sss-perma'));
            sendParams.link = decodeURI(e.currentTarget.href); // Link
            var social = e.currentTarget.classList[1];
            sendParams.social = social.substr(0, (social.length - 1)); // Clean social
        }

        // Send data
        melibu_plugin_ajax.addAjax({
            type: "POST",
            url: melibu_sss_obj.mb_ajax_url + "/wp-admin/admin-ajax.php",
            data: sendParams,
            success: function (req) {
                melibu_plugin_social.successAction(sendParams, req);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });

        return false;
    },
    /**
     * 
     * @param {type} req
     * @returns {undefined}
     */
    successAction: function (sendParams, req) {

        var popUp, reqJson,
                strParam = 'width=' + parseInt(melibu_sss_obj.mb_pop_up_width) + ',height=' + parseInt(melibu_sss_obj.mb_pop_up_height) + ',resizable=' + melibu_sss_obj.mb_pop_up_resize,
                fixer = melibu_plugin_social.killZero(req);
        
        try {
            reqJson = JSON.parse(fixer); // parse from string to object
        } catch (e) {
            reqJson = '';
        }
        
        if (reqJson) {
            
            melibu_plugin_social.setButtonCounts(sendParams, reqJson); // Refresh counts per button
            melibu_plugin_social.setTotalCounts(sendParams, reqJson); // Refresh counts total

            if (sendParams.link !== sendParams.perma + '#') { // check if print
                if (melibu_sss_obj.mb_pop_up === 'on') {
                    
                    popUp = window.open(reqJson.link, 'MB Social', strParam); // Try pop up
                    
                    if (popUp == null || typeof (popUp) == 'undefined') {
                        if (melibu_sss_obj.mb_pop_up_new_window === 'on') {
                            newtab = window.open(reqJson.link, '_blank'); // Try pop up
                        } else {
                            location.href = reqJson.link;
                        }
                    }
                } else {
                    if (melibu_sss_obj.mb_pop_up_new_window === 'on') {
                        newtab = window.open(reqJson.link, '_blank'); // Try pop up
                    } else {
                        location.href = reqJson.link;
                    }
                }
            } else {
                window.print(); // Print
            }
        }
    },
    /**
     * 
     * @param {type} sendParams
     * @param {type} reqJson
     * @returns {undefined}
     */
    setButtonCounts: function (sendParams, reqJson) {

        var buttonCount = document.querySelectorAll('.mb-sharing-social-safe .' + sendParams.social + ' .melibu-share-button__count');
        var sharedFollowCounts = reqJson.shared + 1;
        for (var j = 0; j < buttonCount.length; j++) {
            buttonCount[j].innerHTML = sharedFollowCounts;
        }
    },
    /**
     * 
     * @param {type} sendParams
     * @param {type} reqJson
     * @returns {undefined}
     */
    setTotalCounts: function (sendParams, reqJson) {

        var countFields, count = 0;
        if (sendParams.type === 'share') {
            countFields = document.querySelectorAll('.mb-plugin-sss-count-share');
        } else {
            countFields = document.querySelectorAll('.mb-plugin-sss-count-follow');
        }
        count = reqJson.count + 1; // increment 1 more
        for (var i = 0; i < countFields.length; i++) {
            countFields[i].innerHTML = count; // set new
        }
    },
    /**
     * Open modal
     * @param {type} e
     * @returns {Boolean}
     */
    modalClick: function (e) {

        e.preventDefault(); // Deactivate link
        melibu_plugin_social.dialog.style.top = '10%';
        melibu_plugin_social.modal.style.visibility = 'visible';
        return false;
    },
    /**
     * Close modal
     * @returns {Boolean}
     */
    cancel: function () {

        if (melibu_plugin_social.dialog) {
            melibu_plugin_social.dialog.style.top = '-50%';
            melibu_plugin_social.modal.style.visibility = 'hidden';
        }
        return false;
    },
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
    }
};

var melibu_plugin_social_bar = {
    name: 'MeliBu Plugin SSS bar',
    bar: document.querySelector(".melibu-social--feedback"),
    barTop: document.querySelector(".melibu-social--feedback.mb-sf-top .mb-sharing-social-safe > div"),
    barTopToolTip: document.querySelector(".melibu-social--feedback.mb-sf-top .st-tooltip"),
    barButton: document.querySelectorAll(".melibu-social--feedback-button"),
    /**
     * 
     * @returns {undefined}
     */
    init: function () {

        // CONTENT MODAL AND PRINT
        if (melibu_plugin_social_bar.barButton) {
            var opencloser = melibu_plugin_social_bar.barButton;
            for (var i = 0; i < opencloser.length; i++) {
                melibu_plugin_event.addEvent(opencloser[i], 'click', melibu_plugin_social_bar.click);
                melibu_plugin_event.addEvent(opencloser[i], 'contextmenu', melibu_plugin_social_bar.click);
            }
        }
        // CONTENT MODAL AND PRINT
        if (melibu_plugin_social_bar.barTop) {
            var topBar = melibu_plugin_social_bar.barTop;
            var topBarToolTip = melibu_plugin_social_bar.barTopToolTip;
            topBar.parentNode.insertBefore(topBarToolTip, topBar);
            console.log('ok');
        }
    },
    /**
     * 
     * @param {type} event
     * @returns {undefined}
     */
    click: function (event) {

        event.preventDefault();

        if (melibu_plugin_social_bar.bar.classList.contains("mb-sf-left")) {
            if (melibu_plugin_social_bar.bar.style.left === '-50px' || melibu_plugin_social_bar.bar.style.left === '') {
                melibu_plugin_social_bar.bar.style.left = '0';
                event.currentTarget.style.transform = 'rotate(0)';
            } else {
                melibu_plugin_social_bar.bar.style.left = '-50px';
                event.currentTarget.style.transform = 'rotate(180deg)';
            }
        } else if (melibu_plugin_social_bar.bar.classList.contains("mb-sf-top")) {
            if (melibu_plugin_social_bar.bar.style.top === '-77px' || melibu_plugin_social_bar.bar.style.top === '') {
                melibu_plugin_social_bar.bar.style.top = '0';
                event.currentTarget.style.transform = 'rotate(180deg)';
            } else {
                melibu_plugin_social_bar.bar.style.top = '-77px';
                event.currentTarget.style.transform = 'rotate(-180deg)';
            }

        } else if (melibu_plugin_social_bar.bar.classList.contains("mb-sf-right")) {
            if (melibu_plugin_social_bar.bar.style.right === '-50px' || melibu_plugin_social_bar.bar.style.right === '') {
                melibu_plugin_social_bar.bar.style.right = '0';
                event.currentTarget.style.transform = 'rotate(180deg)';
            } else {
                melibu_plugin_social_bar.bar.style.right = '-50px';
                event.currentTarget.style.transform = 'rotate(0)';
            }
        } else if (melibu_plugin_social_bar.bar.classList.contains("mb-sf-bottom")) {
            if (melibu_plugin_social_bar.bar.style.bottom === '-80px' || melibu_plugin_social_bar.bar.style.bottom === '') {
                melibu_plugin_social_bar.bar.style.bottom = '0';
                event.currentTarget.style.transform = 'rotate(-180deg)';
            } else {
                melibu_plugin_social_bar.bar.style.bottom = '-80px';
                event.currentTarget.style.transform = 'rotate(180deg)';
            }
        }
    }
};

document.addEventListener('DOMContentLoaded', function () {

    melibu_plugin_social.init();
    melibu_plugin_social_bar.init();
});