<!--APPEARANCE START-->
<div class="mb-l-appearance">
    <?php

    function design_button($check, $button, $name, $img = '') {
        ?>
        <div class="mb_radiocheck">
            <img src="<?php echo MELIBU_PLUGIN_URL_02 . 'img/design/' . $img . '.png'; ?>" alt="<?php echo $img; ?>" width="250">
            <label class="st-checkbox-switch">
                <input type="radio" 
                       name="button_design" 
                       value="<?php echo $button; ?>" 
                       id="<?php echo $button; ?>" 
                       class="mb_p_sss_save_data st-checkbox-switch-input"
                       <?php checked((isset($check)&&!empty($check)?$check:''), $button); ?>> 
                <span class="st-checkbox-switch-label" data-on="<?php echo $name; ?>" data-off="<?php echo $name; ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div> 
        <?php
    }

// OPTIONS
    $melibu_social_check_result = $MELIBU_PLUGIN_SHARE->get_by_name('button_design');
    $melibu_social_check_set = 'long';
    if ($melibu_social_check_result) {
        $melibu_social_check_set = $melibu_social_check_result;
    }
    ?>
    <h2><?php _e('Appearance', 'author-box'); ?></h2>
    <p><?php _e('Change buttons design to match your theme', 'sharing-social-safe'); ?>.</p>
    <span class="dashicons dashicons-admin-appearance"></span> <?php _e('Design', 'sharing-social-safe'); ?>
    <div class="mb-st-grid-6">
        <form method="post" action="#" name="mb_p_sss_save_data_options_button_design" id="mb_p_sss_save_data_options_button_design">
            <?php
            design_button($melibu_social_check_set, 'one-button', 'ONE', 'onebutton');
            design_button($melibu_social_check_set, 'glow', 'GLOW', 'glow');
            design_button($melibu_social_check_set, 'glow-corner', 'GLOW C', 'glowcorner');
            design_button($melibu_social_check_set, 'glow-round', 'GLOW R', 'glowround');
            design_button($melibu_social_check_set, 'glow-dark', 'GLOW D', 'glowdark');
            design_button($melibu_social_check_set, 'special-overlap', 'OVER', 'specialoverlap');
            design_button($melibu_social_check_set, 'shining-dark-short', 'SHINE', 'shiningdarkshort');
            design_button($melibu_social_check_set, 'smooth', 'FLAT', 'smooth');
            design_button($melibu_social_check_set, 'corner-smooth', 'FLAT C', 'cornersmooth');
            design_button($melibu_social_check_set, 'round', 'FLAT R', 'round');
            design_button($melibu_social_check_set, 'small', 'FLAT B', 'small');
            design_button($melibu_social_check_set, 'corner', 'FLAT BC', 'corner');
            design_button($melibu_social_check_set, 'smooth-dark', 'FLAT D', 'smoothdark');
            design_button($melibu_social_check_set, 'round-switch', 'FLAT BR', 'round-switch');
            design_button($melibu_social_check_set, 'long', 'FLAT L', 'long');
            design_button($melibu_social_check_set, 'long-rotate', 'FLAT LRR', 'longrotate');
            design_button($melibu_social_check_set, 'long-round', 'FLAT LR', 'longround');
            design_button($melibu_social_check_set, 'shining-dark', 'SHINE D', 'shiningdark');
            design_button($melibu_social_check_set, 'shining-dark-line', 'SHINE DL', 'shiningdarkline');
            design_button($melibu_social_check_set, 'full-width', 'FULL', 'fullwidth');
            ?>
            <input type="hidden" value="1" name="melibu_save">
        </form>
    </div>
    <div class="mb-st-grid-6">
        <h3><span class="dashicons dashicons-visibility"></span> <?php _e('Preview', 'sharing-social-safe'); ?></h3>
        <p><?php _e('Here you have a preview non active, you can click it.', 'sharing-social-safe'); ?></p>
        <h2><span class="dashicons dashicons-share-alt"></span> <span><?php _e('Share Us', 'sharing-social-safe'); ?></span></h2>
        <?php require_once MELIBU_PLUGIN_PATH_02 . 'html/social/dummy_share.php'; ?>
        <h2><span class="dashicons dashicons-randomize"></span> <span><?php _e('Follow Us', 'sharing-social-safe'); ?></span></h2>
        <?php require_once MELIBU_PLUGIN_PATH_02 . 'html/social/dummy_follow.php'; ?>
        <h3><span class="dashicons dashicons-admin-appearance"></span> <?php _e('Layout', 'sharing-social-safe'); ?></h3>
        <p><?php _e('You can make a selection with one click, the new design is stored and displayed immediately here between several MeliBu layouts.', 'sharing-social-safe'); ?></p>
        <h3><span class="dashicons dashicons-smartphone"></span> Mobile</h3>
        <p><?php _e('Go watch in the mobile view to the mobile icons also.', 'sharing-social-safe'); ?></p>
        <!--<p><?php // _e('RSS is only visible if you have set up an RSS feed, determined Melibu the URL and adds the RSS part Button added automatically. ', 'sharing-social-safe');              ?></p>-->
        <h3>Pinterest</h3>
        <p><?php _e('Pinterest is displayed if you have included an image in your page, Melibu automatically switches to link to when an image has been found, (This applies to side photos Post photos) once you have added options in the short code.', 'sharing-social-safe'); ?></p>
    </div>
</div>
<!--APPEARANCE END-->