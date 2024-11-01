/**
 * MELIBU PLUGIN DOCUMENTATION
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.6.0
 */

var melibu_plugin_sss_docu = {
    name: 'MB Social Documentaion',
    selector: 'melibu-sss-docu',
    started: '',
    startIcon: '',
    choosed: '',
    chooseIcon: '',
    payed: '',
    payIcon: '',
    wraped: '',
    wrapIcon: '',
    shiped: '',
    shipIcon: '',
    licensed: '',
    licenseIcon: '',
    part_6: '',
    part_6Icon: '',
    line: '',
    /**
     * 
     * @returns {undefined}
     */
    start: function () {
        
        melibu_plugin_sss_docu.started = document.querySelector("." + melibu_plugin_sss_docu.selector + " .start");
        melibu_plugin_sss_docu.startIcon = document.querySelector("." + melibu_plugin_sss_docu.selector + " .start > .st-icon");
        melibu_plugin_sss_docu.choosed = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-1");
        melibu_plugin_sss_docu.chooseIcon = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-1 > .st-icon");
        melibu_plugin_sss_docu.payed = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-2");
        melibu_plugin_sss_docu.payIcon = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-2 > .st-icon");
        melibu_plugin_sss_docu.wraped = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-3");
        melibu_plugin_sss_docu.wrapIcon = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-3 > .st-icon");
        melibu_plugin_sss_docu.shiped = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-4");
        melibu_plugin_sss_docu.shipIcon = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-4 > .st-icon");
        melibu_plugin_sss_docu.licensed = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-5");
        melibu_plugin_sss_docu.licenseIcon = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-5 > .st-icon");
        melibu_plugin_sss_docu.part_6 = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-6");
        melibu_plugin_sss_docu.part_6Icon = document.querySelector("." + melibu_plugin_sss_docu.selector + " .part-6 > .st-icon");
        melibu_plugin_sss_docu.line = document.querySelector("." + melibu_plugin_sss_docu.selector + " .line");

        melibu_plugin_event.addEvent(melibu_plugin_sss_docu.started, 'click', melibu_plugin_sss_docu.starter);
        melibu_plugin_event.addEvent(melibu_plugin_sss_docu.choosed, 'click', melibu_plugin_sss_docu.part1);
        melibu_plugin_event.addEvent(melibu_plugin_sss_docu.payed, 'click', melibu_plugin_sss_docu.part2);
        melibu_plugin_event.addEvent(melibu_plugin_sss_docu.wraped, 'click', melibu_plugin_sss_docu.part3);
        melibu_plugin_event.addEvent(melibu_plugin_sss_docu.shiped, 'click', melibu_plugin_sss_docu.part4);
        melibu_plugin_event.addEvent(melibu_plugin_sss_docu.licensed, 'click', melibu_plugin_sss_docu.part5);
        melibu_plugin_event.addEvent(melibu_plugin_sss_docu.part_6, 'click', melibu_plugin_sss_docu.part6);
    },
    starter: function (e) {

        melibu_plugin_sss_docu.started.classList.add('st-active');
        melibu_plugin_sss_docu.startIcon.classList.add('st-active');
        melibu_plugin_sss_docu.choosed.classList.remove('st-active');
        melibu_plugin_sss_docu.chooseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.payed.classList.remove('st-active');
        melibu_plugin_sss_docu.payIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.wraped.classList.remove('st-active');
        melibu_plugin_sss_docu.wrapIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.shiped.classList.remove('st-active');
        melibu_plugin_sss_docu.shipIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.licensed.classList.remove('st-active');
        melibu_plugin_sss_docu.licenseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6Icon.classList.remove('st-active');
        melibu_plugin_sss_docu.line.classList.add('one');
        melibu_plugin_sss_docu.line.classList.remove('two', 'three', 'four', 'five', 'six', 'seven');

        document.querySelector("." + melibu_plugin_sss_docu.selector + " .first").classList.add("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fifth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .sixth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .seventh").classList.remove("active");
    },
    part1: function (e) {

        melibu_plugin_sss_docu.started.classList.remove('st-active');
        melibu_plugin_sss_docu.startIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.choosed.classList.add('st-active');
        melibu_plugin_sss_docu.chooseIcon.classList.add('st-active');
        melibu_plugin_sss_docu.payed.classList.remove('st-active');
        melibu_plugin_sss_docu.payIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.wraped.classList.remove('st-active');
        melibu_plugin_sss_docu.wrapIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.shiped.classList.remove('st-active');
        melibu_plugin_sss_docu.shipIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.licensed.classList.remove('st-active');
        melibu_plugin_sss_docu.licenseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6Icon.classList.remove('st-active');
        melibu_plugin_sss_docu.line.classList.add('two');
        melibu_plugin_sss_docu.line.classList.remove('one', 'three', 'four', 'five', 'six', 'seven');

        document.querySelector("." + melibu_plugin_sss_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .second").classList.add("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fifth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .sixth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .seventh").classList.remove("active");
    },
    part2: function (e) {

        melibu_plugin_sss_docu.started.classList.remove('st-active');
        melibu_plugin_sss_docu.startIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.choosed.classList.remove('st-active');
        melibu_plugin_sss_docu.chooseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.payed.classList.add('st-active');
        melibu_plugin_sss_docu.payIcon.classList.add('st-active');
        melibu_plugin_sss_docu.wraped.classList.remove('st-active');
        melibu_plugin_sss_docu.wrapIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.shiped.classList.remove('st-active');
        melibu_plugin_sss_docu.shipIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.licensed.classList.remove('st-active');
        melibu_plugin_sss_docu.licenseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6Icon.classList.remove('st-active');
        melibu_plugin_sss_docu.line.classList.add('three');
        melibu_plugin_sss_docu.line.classList.remove('one', 'two', 'four', 'five', 'six', 'seven');

        document.querySelector("." + melibu_plugin_sss_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .third").classList.add("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fifth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .sixth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .seventh").classList.remove("active");
    },
    part3: function (e) {

        melibu_plugin_sss_docu.started.classList.remove('st-active');
        melibu_plugin_sss_docu.startIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.choosed.classList.remove('st-active');
        melibu_plugin_sss_docu.chooseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.payed.classList.remove('st-active');
        melibu_plugin_sss_docu.payIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.wraped.classList.add('st-active');
        melibu_plugin_sss_docu.wrapIcon.classList.add('st-active');
        melibu_plugin_sss_docu.shiped.classList.remove('st-active');
        melibu_plugin_sss_docu.shipIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.licensed.classList.remove('st-active');
        melibu_plugin_sss_docu.licenseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6Icon.classList.remove('st-active');
        melibu_plugin_sss_docu.line.classList.add('four');
        melibu_plugin_sss_docu.line.classList.remove('one', 'two', 'three', 'five', 'six', 'seven');

        document.querySelector("." + melibu_plugin_sss_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fourth").classList.add("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fifth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .sixth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .seventh").classList.remove("active");
    },
    part4: function (e) {

        melibu_plugin_sss_docu.started.classList.remove('st-active');
        melibu_plugin_sss_docu.startIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.choosed.classList.remove('st-active');
        melibu_plugin_sss_docu.chooseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.payed.classList.remove('st-active');
        melibu_plugin_sss_docu.payIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.wraped.classList.remove('st-active');
        melibu_plugin_sss_docu.wrapIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.shiped.classList.add('st-active');
        melibu_plugin_sss_docu.shipIcon.classList.add('st-active');
        melibu_plugin_sss_docu.licensed.classList.remove('st-active');
        melibu_plugin_sss_docu.licenseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6Icon.classList.remove('st-active');
        melibu_plugin_sss_docu.line.classList.add('five');
        melibu_plugin_sss_docu.line.classList.remove('one', 'two', 'three', 'four', 'six', 'seven');

        document.querySelector("." + melibu_plugin_sss_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fifth").classList.add("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .sixth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .seventh").classList.remove("active");
    },
    part5: function (e) {

        melibu_plugin_sss_docu.started.classList.remove('st-active');
        melibu_plugin_sss_docu.startIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.choosed.classList.remove('st-active');
        melibu_plugin_sss_docu.chooseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.payed.classList.remove('st-active');
        melibu_plugin_sss_docu.payIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.wraped.classList.remove('st-active');
        melibu_plugin_sss_docu.wrapIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.shiped.classList.remove('st-active');
        melibu_plugin_sss_docu.shipIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.licensed.classList.add('st-active');
        melibu_plugin_sss_docu.licenseIcon.classList.add('st-active');
        melibu_plugin_sss_docu.part_6.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6Icon.classList.remove('st-active');
        melibu_plugin_sss_docu.line.classList.add('six');
        melibu_plugin_sss_docu.line.classList.remove('one', 'two', 'three', 'four', 'five', 'seven');

        document.querySelector("." + melibu_plugin_sss_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fifth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .sixth").classList.add("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .seventh").classList.remove("active");
    },
    part6: function (e) {

        melibu_plugin_sss_docu.started.classList.remove('st-active');
        melibu_plugin_sss_docu.startIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.choosed.classList.remove('st-active');
        melibu_plugin_sss_docu.chooseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.payed.classList.remove('st-active');
        melibu_plugin_sss_docu.payIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.wraped.classList.remove('st-active');
        melibu_plugin_sss_docu.wrapIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.shiped.classList.remove('st-active');
        melibu_plugin_sss_docu.shipIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.licensed.classList.remove('st-active');
        melibu_plugin_sss_docu.licenseIcon.classList.remove('st-active');
        melibu_plugin_sss_docu.part_6.classList.add('st-active');
        melibu_plugin_sss_docu.part_6Icon.classList.add('st-active');
        melibu_plugin_sss_docu.line.classList.add('seven');
        melibu_plugin_sss_docu.line.classList.remove('one', 'two', 'three', 'four', 'five', 'six');

        document.querySelector("." + melibu_plugin_sss_docu.selector + " .first").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .second").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .third").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fourth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .fifth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .sixth").classList.remove("active");
        document.querySelector("." + melibu_plugin_sss_docu.selector + " .seventh").classList.add("active");
    }
};

document.addEventListener('DOMContentLoaded', function () {
    melibu_plugin_sss_docu.start();
});