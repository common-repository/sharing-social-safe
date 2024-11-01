<?php
/**
 * MELIBU SOCIAL WIDGET
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 *
 * https://developer.wordpress.org/themes/functionality/widgets/
 */
if (!class_exists('MELIBU_PLUGIN_SOCIAL_FOLLOW_WIDGET_02')) {

    /**
     * SOCIAL WIDGET
     */
    class MELIBU_PLUGIN_SOCIAL_FOLLOW_WIDGET_02 extends WP_Widget {

        /**
         * Register widget with WordPress.
         */
        public function __construct() {

            parent::__construct(
                    'sharing-social-safe-widget-follow', // Base ID
                    'MB Social (Follow us)', // Name
                    array('description' => __('A MeliBu WordPress Widget by Professional Developers', 'sharing-social-safe') . '.')
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

            global $MELIBU_PLUGIN_SHARE, $melibuPluginSSSBitly, $MELIBU_PLUGIN_OPTIONS_02;
            $mbPluginSSSoptions = $MELIBU_PLUGIN_OPTIONS_02->options();
            $melibu_social_check_result = $MELIBU_PLUGIN_SHARE->get_by_name('button_design');
            $melibu_social_check_set = 'long';
            if ($melibu_social_check_result) {
                $melibu_social_check_set = $melibu_social_check_result;
            }

            $title = '';
            $text = '';
            if (isset($instance['title'])) {
                $title = apply_filters('widget_title', $instance['title']);
            }
            if (isset($instance['text'])) {
                $text = apply_filters('widget_text', $instance['text']);
            }

            $userPostTypes = $MELIBU_PLUGIN_OPTIONS_02->post_types(true);
            foreach ($userPostTypes as $userPostType => $userPostTypeValue) {
                if (isset($mbPluginSSSoptions[$userPostType]) && $mbPluginSSSoptions[$userPostType] == 'allow') {
                    if ($userPostType == get_post_type()) {
                        echo $args['before_widget'];

                        if (!empty($title)) {
                            echo $args['before_title'] . $title . $args['after_title'];
                        }
                        ?>
                        <!-- MELIBU SHARING SOCIAL SAFE BY SAMET TARIM -->
                        <div class="mb-sharing-social-safe">
                            <?php
                            $return = $melibuPluginSSSBitly->user_link_lookup(get_permalink());
                            $melibu_plugin_get_social_count = get_option('melibu_plugin_get_social_count');
                            if (isset($melibu_plugin_get_social_count['onoff']) && $melibu_plugin_get_social_count['onoff'] == 'on') {
                                echo '<em>' . __('Already', 'sharing-social-safe') . ' <strong class="mb-plugin-sss-count-follow">' . $MELIBU_PLUGIN_SHARE->get_count_by_url($return['bitly_perma'], 'follow') . '</strong> ' . __('times followed', 'sharing-social-safe') . '...</em>';
                            }
                            $melibu_plugin_get_social_count_singlecount = '';
                            if (isset($melibu_plugin_get_social_count['singlecount']) && !empty($melibu_plugin_get_social_count['singlecount'])) {
                                $melibu_plugin_get_social_count_singlecount = $melibu_plugin_get_social_count['singlecount'];
                            }
                            ?>
                            <div class="<?php echo esc_attr($melibu_social_check_set); ?>">
                                <?php
                                $social_media = $MELIBU_PLUGIN_SHARE->follow_settings();
                                foreach ($social_media as $key => $value) {
                                    if (!empty($value['link'])) {
                                        ?>
                                        <a rel="popup" href="<?php echo esc_url($value['link']); ?>" target='_blank' class="melibu-share-button <?php echo esc_attr($value['class']); ?>" data-mb-sss-click="follow" data-mb-sss-perma="<?php echo get_permalink(); ?>" data-mb-sss-title="<?php echo get_the_title(); ?>">
                                            <span class="melibu-share-button__inner">
                                                <span class="melibu-share-button__shine"></span>
                                                <span class="melibu-share-button__icon"><i class="<?php echo esc_attr($value['icon']); ?>" aria-hidden="true"></i></span>
                                                <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                                    <span class="melibu-share-button__count"><?php echo $MELIBU_PLUGIN_SHARE->get_count_by_social(substr($value['class'], 0, -1), 'follow'); ?></span>
                                                <?php } ?>
                                            </span>
                                            <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="st-clear"></div>
                            </div>
                            <?php
                            $melibu_plugin_get_social_copy = get_option('melibu_plugin_get_social_copy');
                            if (isset($melibu_plugin_get_social_copy['onoff']) && $melibu_plugin_get_social_copy['onoff'] == 'on') {
                                ?>
                                <div class="st-social-copy">
                                    <?php _e('Powerd by', 'sharing-social-safe'); ?> &copy; <a href="http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe/" target="_blank">Melibu</a>
                                </div>
                            <?php } ?>

                        </div>
                        <!-- MELIBU SHARING SOCIAL SAFE BY SAMET TARIM -->
                        <?php
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

            global $MELIBU_PLUGIN_SHARE;
            $melibu_social_check_result = $MELIBU_PLUGIN_SHARE->get_by_name('button_design');
            $melibu_social_check_set = 'long';
            if ($melibu_social_check_result) {
                $melibu_social_check_set = $melibu_social_check_result;
            }

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

            echo '<p>' . __('Please fill out your contact information first', 'sharing-social-safe') . ' <a href="profile.php">' . __('Contact Info', 'sharing-social-safe') . '</a></p>';

            $social_media = $MELIBU_PLUGIN_SHARE->follow_settings();
            foreach ($social_media as $key => $value) {

                $social_media_link = isset($value['link']) ? $value['link'] : (isset($instance[$value['class']]) ? esc_attr($instance[$value['class']]) : '');
                echo '<p>';
                echo '<label for="' . $this->get_field_id($value['class']) . '">';
                echo '<i class="' . $value['icon'] . '"></i> ';
                echo $value['title'];
                echo '</label>';
                echo '<input type="text" name="' . $this->get_field_name($value['class']) . '" value="' . esc_url($social_media_link) . '" class="widefat" id="' . $this->get_field_id($value['class']) . '" readonly="readonly">';
                echo '</p>';
            }

            $melibu_plugin_get_social_count = get_option('melibu_plugin_get_social_count');
            $melibu_plugin_get_social_count_singlecount = '';
            if (isset($melibu_plugin_get_social_count['singlecount']) && !empty($melibu_plugin_get_social_count['singlecount'])) {
                $melibu_plugin_get_social_count_singlecount = $melibu_plugin_get_social_count['singlecount'];
            }
            ?>
            <div class="mb-sharing-social-safe">
                <div class="<?php echo esc_attr($melibu_social_check_set); ?>">
                    <?php
                    foreach ($social_media as $key => $value) {
                        if (!empty($instance[$value['class']])) {
                            ?>
                            <a rel="popup" href="<?php echo $instance[$value['class']]; ?>" target='_blank' class="melibu-share-button <?php echo esc_attr($value['class']); ?>" data-mb-sss-click="follow" data-mb-sss-perma="<?php echo get_permalink(); ?>" data-mb-sss-title="<?php echo get_the_title(); ?>">
                                <span class="shinereflex"></span>
                                <span class="melibu-share-button__icon">
                                    <i class="<?php echo $value['icon']; ?>" aria-hidden="true"></i>
                                </span>
                                <?php if ($melibu_plugin_get_social_count_singlecount == 'on') { ?>
                                    <span class="melibu-share-button__count">
                                        <?php echo $this->get_count_by_social(substr($value['class'], 0, -1), 'share'); ?>
                                    </span>
                                <?php } ?>
                                <?php echo $MELIBU_PLUGIN_SHARE->socialTranslate($melibu_social_check_set); ?>
                            </a>
                            <?php
                        }
                    }
                    ?>
                    <div class="st-clear"></div>
                </div>
                <div class="st-social-copy">
                    <?php _e('Powerd by', 'sharing-social-safe'); ?> &copy; <a href="http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe/" target="_blank">Melibu</a>
                </div>
            </div>
            <?php
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

            global $MELIBU_PLUGIN_SHARE;
            $instance = $old_instance;
            $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
            $instance['text'] = (!empty($new_instance['text']) ) ? strip_tags($new_instance['text']) : '';
            $social_media = $MELIBU_PLUGIN_SHARE->follow_settings();
            foreach ($social_media as $key => $value) {

                $instance[$value['class']] = (!empty($new_instance[$value['class']]) ) ? strip_tags($new_instance[$value['class']]) : '';
                delete_option('mb-widget-social-value-' . $value['class'], $instance[$value['class']]);
                delete_option('mb-widget-social-class-' . $value['class'], $value['class']);
                delete_option('mb-widget-social-icon-' . $value['class'], $value['icon']);
            }
            return $instance;
        }

    }

}