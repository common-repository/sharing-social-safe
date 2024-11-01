<?php

require_once 'class.MelibuSocialAbstract.php';
/**
 * Melibu Social
 *
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wordpress/melibu-plugins/sharing-social-safe
 * @package     Melibu
 * @subpackage  Sharing Social Safe
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_SHARE_HEADS')) {

    class MELIBU_PLUGIN_SHARE_HEADS extends MELIBU_PLUGIN_SHARE_ABSTRACT {

        /**
         * 
         */
        public function twitter_card($excerpt) {

            /**
             * Twitter Cards
             * @see https://dev.twitter.com/cards/getting-started
             * 
             * twitter:card | Required
             * Should be set to a value of "summary" / "summary_large_image".
             * 
             * twitter:site | Required
             * @username for the website used in the card footer.
             * 
             * twitter:creator | Required
             * @username for the content creator / author.
             * 
             * twitter:title | Required
             * A concise title for the related content.
             * 
             * twitter:description | Required
             * A description that concisely summarizes the content.
             * 
             * twitter:image | Optional
             * A URL to a unique image representing the content.
             * 
             * twitter:image:alt | Optional
             * A text description of the image.
             * 
             */
            $twitterCard = (string) isset($this->options['twitter-card']) && !empty($this->options['twitter-card']) ? $this->options['twitter-card'] : '';
            $twitterCardType = (string) isset($this->options['twitter-card-type']) && !empty($this->options['twitter-card-type']) ? $this->options['twitter-card-type'] : 'summary';
            $twitterCardSite = isset($this->options['twitter-card-site']) && !empty($this->options['twitter-card-site']) ? $this->options['twitter-card-site'] : '';
            $twitterCardCreator = isset($this->options['twitter-card-creator']) && !empty($this->options['twitter-card-creator']) ? $this->options['twitter-card-creator'] : '';
            $twitterCardImage = (string) isset($this->options['twitter-card-image']) && !empty($this->options['twitter-card-image']) ? $this->options['twitter-card-image'] : get_the_post_thumbnail_url();
            $twitterCardImageAlt = (string) isset($this->options['twitter-card-image-alt']) && !empty($this->options['twitter-card-image-alt']) ? $this->options['twitter-card-image-alt'] : $excerpt;
            $facebookCard = (string) isset($this->options['facebook-card']) && !empty($this->options['facebook-card']) ? $this->options['facebook-card'] : '';
            if ($twitterCard == 'on') {

                if ($facebookCard != 'on') {
                    echo '<meta property="og:url" content="' . get_the_permalink() . '">';
                    echo '<meta property="og:title" content="' . get_the_title() . '">';
                    echo '<meta property="og:description" content="' . $excerpt . '">';
                    echo '<meta property="og:image" content="' . get_the_post_thumbnail_url() . '">';
                }

                echo '<meta name="twitter:card" content="' . $twitterCardType . '">';
                if (!empty($twitterCardSite)) {
                    echo '<meta name="twitter:site" content="' . $twitterCardSite . '">';
                }
                if (!empty($twitterCardCreator)) {
                    echo '<meta name="twitter:creator" content="' . $twitterCardCreator . '">';
                }
                if (!empty($twitterCardImage)) {
                    echo '<meta name="twitter:image" content="' . $twitterCardImage . '">';
                }
                if (!empty($twitterCardImageAlt)) {
                    echo '<meta name="twitter:image:alt" content="' . $twitterCardImageAlt . '">';
                }
            }
        }

        /**
         * 
         */
        public function facebook_card($excerpt) {

            /**
             * Facebook Cards
             * @see https://developers.facebook.com/docs/sharing/webmasters
             * 
             * og:url | Required
             * Die kanonische URL für deine Seite.
             * 
             * og:title | Required
             * Der Titel deines Artikels ohne Branding (z. B. der Name der Website) .
             * 
             * og:description | Required
             * Eine kurze Beschreibung des Inhalts.
             * 
             * og:image | Required
             * Die URL des Bildes, das angezeigt werden soll.
             * 
             * fb:app_id | Optional
             * Um die Domain-Statistiken von Facebook zu nutzen.
             * 
             */
            $facebookCardType = (string) isset($this->options['facebook-card-type']) && !empty($this->options['facebook-card-type']) ? $this->options['facebook-card-type'] : 'website';
            $facebookCardURL = (string) isset($this->options['facebook-card-url']) && !empty($this->options['facebook-card-url']) ? $this->options['facebook-card-url'] : get_the_permalink();
            $facebookCardTitle = (string) isset($this->options['facebook-card-title']) && !empty($this->options['facebook-card-title']) ? $this->options['facebook-card-title'] : get_the_title();
            $facebookCardDescription = (string) isset($this->options['facebook-card-description']) && !empty($this->options['facebook-card-description']) ? $this->options['facebook-card-description'] : $excerpt;
            $facebookCardImage = (string) isset($this->options['facebook-card-image']) && !empty($this->options['facebook-card-image']) ? $this->options['facebook-card-image'] : get_the_post_thumbnail_url();
            $facebookCardfb = (string) isset($this->options['facebook-card-fb']) && !empty($this->options['facebook-card-fb']) ? $this->options['facebook-card-fb'] : '';
            $facebookCard = (string) isset($this->options['facebook-card']) && !empty($this->options['facebook-card']) ? $this->options['facebook-card'] : '';
            if ($facebookCard == 'on') {
                echo '<meta property="og:locale" content="' . get_locale() . '">';
                if (!empty($facebookCardURL)) {
                    echo '<meta property="og:url" content="' . $facebookCardURL . '">';
                }
                if (!empty($facebookCardType)) {
                    echo '<meta property="og:type" content="' . $facebookCardType . '">';
                }
                if (!empty($facebookCardTitle)) {
                    echo '<meta property="og:title" content="' . $facebookCardTitle . '">';
                }
                if (!empty($facebookCardDescription)) {
                    echo '<meta property="og:description" content="' . $facebookCardDescription . '">';
                }
                if (!empty($facebookCardImage)) {
                    echo '<meta property="og:image" content="' . $facebookCardImage . '">';
                }
                if (!empty($facebookCardfb)) {
                    echo '<meta property="fb:app_id" content="' . $facebookCardfb . '">';
                }
            }
        }

        /**
         * 
         */
        public function pinterest_rich_pin($excerpt) {

            $userID = '';
            if (null !== get_the_author_meta('ID')) {
                $userID = get_the_author_meta('ID');
            }

            /**
             * Pintrest Rich Pin
             * @see https://developers.pinterest.com/docs/rich-pins/overview/?
             * 
             * pinterest-rich-pin
             * 2014-08-12T00:01:56+00:00
             * 
             * og:type | Required
             * Must take the value of "article" or "blog".
             * 
             * og:title | Required
             * The article title.
             * 
             * og:description | Required
             * The article description or summary.
             * 
             * og:site_name
             * The site name (e.g., "the Guardian").
             * 
             * article:published_time
             * The date the article was first published.
             * 
             * article:author
             * The article author.
             * 
             */
            $pinterestRichPin = (string) isset($this->options['pinterest-rich-pin']) && !empty($this->options['pinterest-rich-pin']) ? $this->options['pinterest-rich-pin'] : '';
            $pinterestRichPinType = (string) isset($this->options['pinterest-rich-pin-type']) && !empty($this->options['pinterest-rich-pin-type']) ? $this->options['pinterest-rich-pin-type'] : "blog";
            $pinterestRichPinOpt = (bool) isset($this->options['pinterest-rich-pin-opt']) && !empty($this->options['pinterest-rich-pin-opt']) ? $this->options['pinterest-rich-pin-opt'] : '';
            $pinterestRichPinSite = (string) isset($this->options['pinterest-rich-pin-site']) && !empty($this->options['pinterest-rich-pin-site']) ? $this->options['pinterest-rich-pin-site'] : get_bloginfo('name');
            $pinterestRichPinPublish = (string) isset($this->options['pinterest-rich-pin-publish']) && !empty($this->options['pinterest-rich-pin-publish']) ? $this->options['pinterest-rich-pin-publish'] : get_the_date('Y-m-d') . 'T' . get_the_time('H:i:s');
            $pinterestRichPinAuthor = (string) isset($this->options['pinterest-rich-pin-author']) && !empty($this->options['pinterest-rich-pin-author']) ? $this->options['pinterest-rich-pin-author'] : get_the_author_meta('display_name', $userID);
            $pinterestRichPinTitle = (string) isset($this->options['pinterest-rich-pin-title']) && !empty($this->options['pinterest-rich-pin-title']) ? $this->options['pinterest-rich-pin-title'] : get_the_title();
            $pinterestRichPinDescription = (string) isset($this->options['pinterest-rich-pin-description']) && !empty($this->options['pinterest-rich-pin-description']) ? $this->options['pinterest-rich-pin-description'] : $excerpt;
            if ($pinterestRichPin == 'on') {

                $facebookCard = (string) isset($this->options['facebook-card']) && !empty($this->options['facebook-card']) ? $this->options['facebook-card'] : '';
                if ($facebookCard != 'on') {
                    if (!empty($pinterestRichPinType) && $twitterCard != 'on') {
                        echo '<meta property="og:type" content="' . $pinterestRichPinType . '">';
                    }
                    if (!empty($pinterestRichPinTitle) && $twitterCard != 'on') {
                        echo '<meta property="og:title" content="' . $pinterestRichPinTitle . '">';
                    }
                    if (!empty($pinterestRichPinDescription) && $twitterCard != 'on') {
                        echo '<meta property="og:description" content="' . $pinterestRichPinDescription . '">';
                    }
                }

                echo '<meta property="og:site_name" content="' . $pinterestRichPinSite . '">';
                echo '<meta property="article:published_time" content="' . $pinterestRichPinPublish . '">';

                if (!empty($pinterestRichPinDescription)) {
                    echo '<meta property="article:author" content="' . $pinterestRichPinAuthor . '">';
                }

                if ($pinterestRichPinOpt == 'on') {
                    echo '<meta name="pinterest-rich-pin" content="false">';
                }
            }
        }

    }

}