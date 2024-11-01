<?php
/**
 * MELIBU PLUGIN WIDGET
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.1.5
 */
if (!class_exists('MELIBU_PLUGIN_SOCIAL_SHARE_WIDGET_02')) {

    /**
     * SOCIAL WIDGET
     */
    class MELIBU_PLUGIN_SOCIAL_SHARE_WIDGET_02 extends WP_Widget {

        /**
         * Attributes
         * 
         * @var type 
         */
        private $DB = null;
        private $widgetCheckboxes = array(
            'widget_checkbox_0' => 'wordpress',
            'widget_checkbox_1' => 'googleplus',
            'widget_checkbox_2' => 'facebook',
            'widget_checkbox_3' => 'twitter',
            'widget_checkbox_4' => 'xing',
            'widget_checkbox_5' => 'linkedin',
            'widget_checkbox_6' => 'tumblr',
            'widget_checkbox_7' => 'reddit',
            'widget_checkbox_8' => 'digg',
            'widget_checkbox_9' => 'delicious',
            'widget_checkbox_10' => 'stumbleupon',
            'widget_checkbox_11' => 'getpocket',
            'widget_checkbox_12' => 'pinterest',
            'widget_checkbox_13' => 'whatsapp',
            'widget_checkbox_14' => 'mail',
            'widget_checkbox_15' => 'print'
        );

        /**
         * Register widget with WordPress.
         * And get $wpdb to private modus
         */
        public function __construct() {

            global $wpdb;
            $this->DB = $wpdb;

            parent::__construct(
                    'sharing-social-safe-widget-share', // Base ID
                    'MB Social (Share us)', // Name
                    array('description' => __('A MeliBu WordPress Widget by Professionals Developers', 'sharing-social-safe') . '.')
            );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget($args, $instance) {

            global $MELIBU_PLUGIN_SHARE, $MELIBU_PLUGIN_OPTIONS_02;
            $mbPluginSSSoptions = $MELIBU_PLUGIN_OPTIONS_02->options();
            
            $title = '';
            $text = '';
            if (isset($instance['title'])) {
                $title = apply_filters('widget_title', $instance['title']);
            }
            if (isset($instance['text'])) {
                $text = apply_filters('widget_text', $instance['text']);
            }

            foreach ($this->widgetCheckboxes as $key => $widgetCheckbox) {
                if (isset($instance[$key])) {
                    apply_filters($key, $instance[$key]);
                }
            }

            $userPostTypes = $MELIBU_PLUGIN_OPTIONS_02->post_types(true);
            foreach ($userPostTypes as $userPostType => $userPostTypeValue) {
                if ($userPostType == get_post_type()) {
                    if (isset($mbPluginSSSoptions[$userPostType]) && $mbPluginSSSoptions[$userPostType] == 'allow') {
                        echo $args['before_widget'];
                        if (!empty($title)) {
                            echo $args['before_title'] . $title . $args['after_title'];
                        }
                        if (isset($instance)) { 
                            $teile = $this->get_string($instance);
                            echo $MELIBU_PLUGIN_SHARE->social($teile); 
                        }
                        if (!empty($text)) {
                            echo $text;
                        }
                        echo $args['after_widget'];
                    }
                }
            }
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance) {

            $title = '';
            $text = '';

            if (isset($instance['title'])) {
                $title = $instance['title'];
            }

            if (isset($instance['text'])) {
                $text = $instance['text'];
            }

            echo '<p>';
            echo '<label for="' . $this->get_field_name('title') . '">';
            _e('Title', 'sharing-social-safe');
            echo '</label>';
            echo '<input type="text" name="' . $this->get_field_name('title') . '" value="' . $title . '" class="widefat" id="' . $this->get_field_id('title') . '" />';
            echo '</p>';

            echo '<p>';
            _e('Select', 'sharing-social-safe');
            echo ':';
            foreach ($this->widgetCheckboxes as $key => $widgetCheckbox) {

                if (isset($this->widgetCheckboxes[$key])) {
                    echo '<br /><input type="checkbox" name="' . $this->get_field_name($key) . '" value="on" ' . checked((isset($instance[$key]) && $instance[$key] != '' ? $instance[$key] : ''), 'on', false) . ' class="widefat" id="' . $this->get_field_id($key) . '" />';
                    echo '<label for="' . $this->get_field_id($key) . '">';
                    echo ucfirst($widgetCheckbox);
                    echo '</label>';
                }
            }
            echo '</p>';

            $this->dummy($instance);

            echo '<p>';
            echo '<label for="' . $this->get_field_id('text') . '">';
            _e('Text & Short Code', 'sharing-social-safe');
            echo '</label>';
            echo '<textarea name="' . $this->get_field_name('text') . '" class="widefat" id="' . $this->get_field_id('text') . '">' . $text . '</textarea>';
            echo '</p>';
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update($new_instance, $old_instance) {

            $instance = $old_instance;
            $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
            $instance['text'] = (!empty($new_instance['text']) ) ? strip_tags($new_instance['text']) : '';
            foreach ($this->widgetCheckboxes as $key => $widgetCheckbox) {
                $instance[$key] = (isset($new_instance[$key]) && !empty($new_instance[$key])) ? $new_instance[$key] : '';
            }
            return $instance;
        }

        /**
         * Gives the checked String back
         * 
         * @see MELIBU_PLUGIN_WIDGET_02::get_string()
         * 
         * @param type $instance
         * @return type
         */
        public function get_string($instance) {
            
            $arr = array();
            $str = '';
            foreach ($this->widgetCheckboxes as $key => $widgetCheckbox) {
                if (!empty($instance[$key])) {
                    $str .= $widgetCheckbox . ',';
                }
            }
            $arr['share'] = $str;
            return $arr;
        }

        /**
         * This is the Melibu Share Widget Dummy
         * 
         * @see MELIBU_PLUGIN_WIDGET_02::dummy()
         * 
         * @param type $instance
         * @return type
         */
        public function dummy($instance) {

            global $MELIBU_PLUGIN_SHARE;
            
            $melibu_social_check_result = $MELIBU_PLUGIN_SHARE->get_by_name('button_design');
            $melibu_social_check_set = 'long';
            if ($melibu_social_check_result) {
                $melibu_social_check_set = $melibu_social_check_result;
            }
            
            $melibu_plugin_get_social_count = get_option('melibu_plugin_get_social_count');
            $melibu_plugin_get_social_count_singlecount = '';
            if (isset($melibu_plugin_get_social_count['singlecount']) && !empty($melibu_plugin_get_social_count['singlecount'])) {
                $melibu_plugin_get_social_count_singlecount = $melibu_plugin_get_social_count['singlecount'];
            }
            
            $teile = $this->get_string($instance);
            $teile = explode(",", $teile['share']);
            ?>
            <!-- MELIBU SHARING SOCIAL SAFE BY SAMET TARIM -->
            <div class="mb-sharing-social-safe">

                <div class="<?php echo $melibu_social_check_set; ?>">

                    <?php if (in_array("wordpress", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> WordPress" class="melibu-share-button wordpresss slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-wordpress"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('wordpress', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("googleplus", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Google+" class="melibu-share-button googlepluss slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-google-plus"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('googleplus', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("facebook", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Facebook" class="melibu-share-button facebooks slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-facebook"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('facebook', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("twitter", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Twitter" class="melibu-share-button twitters slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-twitter"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('twitter', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("xing", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Xing" class="melibu-share-button xings slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-xing"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('xing', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("linkedin", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> LinkedIn" class="melibu-share-button linkedins slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-linkedin"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('linkedin', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("tumblr", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> tumblr" class="melibu-share-button tumblrs slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-tumblr"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $this->get_count_by_social('tumblr', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("reddit", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> reddit" class="melibu-share-button reddits slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-reddit"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('reddit', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("digg", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> digg" class="melibu-share-button diggs slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-digg"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('digg', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("delicious", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> delicious" class="melibu-share-button deliciouss slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-delicious"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('delicious', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("stumbleupon", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> stumbleupon" class="melibu-share-button stumbleupons slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-stumbleupon"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('stumbleupon', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("getpocket", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> getpocket" class="melibu-share-button getpockets slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-get-pocket"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('getpocket', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("pinterest", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> Pinterest" class="melibu-share-button pinterests slide">
                            <span class="melibu-share-button__shine"></span><span>
                                <i class="fa fa-pinterest-p"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('pinterest', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("whatsapp", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on', 'sharing-social-safe'); ?> WhatsApp" class="melibu-share-button whatsapps slide" style="display: inline-block;">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-whatsapp"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('whatsapp', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("mail", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on Mail', 'sharing-social-safe'); ?>" class="melibu-share-button mailits slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-envelope-o"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('mail', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>
                    <?php if (in_array("print", $teile)) { ?>
                        <a href="#" rel="popup" title="<?php _e('Share on Print', 'sharing-social-safe'); ?>" class="melibu-share-button prints slide">
                            <span class="melibu-share-button__shine"></span>
                            <span class="melibu-share-button__icon">
                                <i class="fa fa-print"></i>
                            </span>
                            <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                <span class="melibu-share-button__count">
                                    <?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social('print', 'share'); ?>
                                </span>
                            <?php } ?>
                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                        </a>
                    <?php } ?>

                    <?php
                    $backturn = '';
                    $melibu_plugin_get_social_privacy = get_option('melibu_plugin_get_social_privacy');
                    $melibu_plugin_get_social_privacy_opt = get_option('melibu_plugin_get_social_privacy_opt');
                    if (isset($melibu_plugin_get_social_privacy_opt['onoff']) && $melibu_plugin_get_social_privacy_opt['onoff'] == 'on') {
                        $backturn .= '<div class="st-tooltip">';
                        $backturn .= '<span>';
                        if (isset($melibu_plugin_get_social_privacy['info_link']) && $melibu_plugin_get_social_privacy['info_link'] != '') {
                            $backturn .= '<a href="' . (isset($melibu_plugin_get_social_privacy['info_link']) ? $melibu_plugin_get_social_privacy['info_link'] : '#') . '" title="' . __('Click for more Privacy', 'sharing-social-safe') . '">';
                        }
                        $backturn .= '?';
                        if (isset($melibu_plugin_get_social_privacy['info_link']) && $melibu_plugin_get_social_privacy['info_link'] != '') {
                            $backturn .= '</a>';
                        }
                        $backturn .= '</span>';
                        $backturn .= '<div class="content">';
                        $backturn .= '<b></b>';
                        if (isset($melibu_plugin_get_social_privacy['info_title']) && $melibu_plugin_get_social_privacy['info_title'] != '') {
                            $backturn .= '<h3>' . __(isset($melibu_plugin_get_social_privacy['info_title']) ? $melibu_plugin_get_social_privacy['info_title'] : '', 'sharing-social-safe') . '</h3>';
                        } else {
                            $backturn .= '<h3>Privacy</h3>';
                        }
                        if (isset($melibu_plugin_get_social_privacy['info_text']) && $melibu_plugin_get_social_privacy['info_text'] != '') {
                            $backturn .= '<p>' . __(isset($melibu_plugin_get_social_privacy['info_text']) ? $melibu_plugin_get_social_privacy['info_text'] : '', 'sharing-social-safe') . '</p>';
                        } else {
                            $backturn .= '<p>Privacy info Box, insert your own text and linked with a page.</p>';
                        }
                        $backturn .= '</div>';
                        $backturn .= '</div>';
                    }
                    echo $backturn;
                    ?>
                </div>
                <div class="st-social-copy">
                    <?php _e('Powerd by', 'sharing-social-safe'); ?> &copy; <a href="http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe/" target="_blank">Melibu</a>
                </div>
            </div>
            <!-- MELIBU SHARING SOCIAL SAFE BY SAMET TARIM -->
            <?php
        }

    }

}