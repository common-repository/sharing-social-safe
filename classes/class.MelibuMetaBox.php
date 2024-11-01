<?php
/**
 * MELIBU PLUGIN
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/latest-posts-slides
 * @package     Melibu
 * @subpackage  Latest Posts Slides
 * @since       1.1.1
 */

if (!class_exists('MELIBU_PLUGIN_02_META_BOXES')) {

    /**
     * Register a meta box using a class.
     */
    class MELIBU_PLUGIN_02_META_BOXES {

        /**
         * Constructor.
         */
        public function __construct() {

            if (is_admin()) {
                add_action('load-post.php', array($this, 'init_metabox'));
                add_action('load-post-new.php', array($this, 'init_metabox'));
            }
        }

        /**
         * Meta box initialization.
         */
        public function init_metabox() {


            add_action('add_meta_boxes', array($this, 'add_metabox'));
            add_action('save_post', array($this, 'save_metabox'), 10, 2);
        }

        /**
         * Adds the meta box.
         */
        public function add_metabox() {
            add_meta_box(
                    'mb-social-meta-box', // ID 
                    __('MB Sharing Social Safe', 'sharing-social-safe'), // Name
                    array($this, 'metabox'), // function
                    array('post'), // Where
                    'normal', //
                    'low' // Priority
            );
        }

        /**
         * Handles saving the meta box.
         *
         * @param int     $post_id Post ID.
         * @param WP_Post $post    Post object.
         * @return null
         */
        public function save_metabox($post_id, $post) {

            // Check if our nonce is set.
            if (!isset($_POST['mb-social-meta-nonce-action'])) {
                return $post_id;
            }

            $nonce = $_POST['mb-social-meta-nonce-action'];

            // Verify that the nonce is valid.
            if (!wp_verify_nonce($nonce, 'mb-social-meta-nonce')) {
                return $post_id;
            }

            /*
             * If this is an autosave, our form has not been submitted,
             * so we don't want to do anything.
             */
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $post_id;
            }

            // Check the user's permissions.
            if ('page' == $_POST['post_type']) {
                if (!current_user_can('edit_page', $post_id)) {
                    return $post_id;
                }
            } else {
                if (!current_user_can('edit_post', $post_id)) {
                    return $post_id;
                }
            }

            /* OK, it's safe for us to save the data now. */

            if (!isset($_POST['mb-social-custom-posts-slides'])) {
                $mydata = '';
            } else {
                // Sanitize the user input.
                $mydata = $_POST['mb-social-custom-posts-slides'];
            }

            // Update the meta field.
            update_post_meta($post_id, 'mb-social-custom-posts-slides', serialize($mydata));
        }

        /**
         * 
         * @global type $post_ID
         */
        public function metabox() {

            global $post, $enteredPostsArray;
            $enteredPostsArray = array();
            $postMeta = get_post_meta($post->ID, 'mb-social-custom-posts-slides');
            if ($postMeta) {
                $unserilizedPostMeta = unserialize($postMeta[0]);
//                echo '<pre>';
//                var_dump($unserilizedPostMeta[$post->ID]);
//                echo '</pre>';
            }

            $postIDactually = $post->ID;

            // ARGS all post and only posts
            $args = array(
                'posts_per_page' => -1,
                'post_type' => array('post'),
            );
            // QUERY
            $the_query = new WP_Query($args);

            echo '<div class="mb-lps-drop">';

            // Check if have posts
            if ($the_query->have_posts()) {

                $loopnumber = 0;
                echo '<div class="mb-lps-drop--zone-start">';

                // Loop posts
                while ($the_query->have_posts()) {

                    $the_query->the_post();

                    if (isset($unserilizedPostMeta[$postIDactually]) && @array_key_exists(get_the_ID(), $unserilizedPostMeta[$postIDactually]) && $unserilizedPostMeta[$postIDactually][get_the_ID()] == 'start') {

                        // Drop drag
                        echo '<div id="drop' . $loopnumber . '" class="mb-lps-drop--zone-drag mb-st-grid-4" draggable="true">';
                        if (get_the_post_thumbnail()) {

                            // Thumbnail
                            echo '<div class="mb-lps-drop--zone-drag-image mb-st-grid-3">';
                            the_post_thumbnail();
                            echo '</div>';
                        }

                        // Hidden input
                        echo '<input type="hidden" name="mb-lps-custom-posts-slides[' . $postIDactually . '][' . get_the_ID() . ']" value="start" id="drop-input">';

                        // Title
                        echo '<div class="mb-lps-drop--zone-drag-title mb-st-grid-9">';
                        the_title();
                        echo '</div>';

                        echo '<div class="st-clear"></div>';
                        echo '</div>';
                        $loopnumber++; // Drop ID counter
                    } else {
                        // Drop drag
                        echo '<div id="drop' . $loopnumber . '" class="mb-lps-drop--zone-drag mb-st-grid-4" draggable="true">';
                        if (get_the_post_thumbnail()) {

                            // Thumbnail
                            echo '<div class="mb-lps-drop--zone-drag-image mb-st-grid-3">';
                            the_post_thumbnail();
                            echo '</div>';
                        }

                        // Hidden input
                        echo '<input type="hidden" name="mb-lps-custom-posts-slides[' . $postIDactually . '][' . get_the_ID() . ']" value="start" id="drop-input">';

                        // Title
                        echo '<div class="mb-lps-drop--zone-drag-title mb-st-grid-9">';
                        the_title();
                        echo '</div>';

                        echo '<div class="st-clear"></div>';
                        echo '</div>';
                        $loopnumber++; // Drop ID counter
                    }
                }

                echo '</div>';
            }

            echo '<div class="mb-lps-drop--zone-enter">';
            if ($the_query->have_posts()) {
                // Loop posts
                while ($the_query->have_posts()) {
                    $the_query->the_post();

                    // 
                    if (isset($unserilizedPostMeta[$postIDactually]) && @array_key_exists(get_the_ID(), $unserilizedPostMeta[$postIDactually]) && $unserilizedPostMeta[$postIDactually][get_the_ID()] == 'enter') {

                        $enteredPostsArray['IDs'][] = get_the_ID();
                        echo '<div id="drop' . $loopnumber . '" class="mb-lps-drop--zone-drag mb-st-grid-4" draggable="true">';

                        echo $unserilizedPostMeta[$postIDactually][get_the_ID()];
                        if (get_the_post_thumbnail()) {
                            // Thumbnail
                            echo '<div class="mb-lps-drop--zone-drag-image mb-st-grid-3">';
                            the_post_thumbnail();
                            echo '</div>';
                        }

                        // Hidden input
                        echo '<input type="hidden" name="mb-lps-custom-posts-slides[' . $postIDactually . '][' . get_the_ID() . ']" value="enter" id="drop-input">';

                        // Title
                        echo '<div class="mb-lps-drop--zone-drag-title mb-st-grid-9">';
                        the_title();
                        echo '</div>';
                        echo '<div class="st-clear"></div>';
                        echo '</div>';
                        $loopnumber++; // Drop ID counter
                    }
                }
            }
            echo '</div>';

            echo '<div class="st-clear"></div>';

            echo '</div>';
            // Add an nonce field so we can check for it later.
            wp_nonce_field('mb-lps-meta-nonce', 'mb-lps-meta-nonce-action');
        }

    }

//    new MELIBU_PLUGIN_02_META_BOXES();
}