<?php
global $MELIBU_PLUGIN_SHARE, $MELIBU_PLUGIN_OPTIONS_02;
$mbPluginSSSoptions = $MELIBU_PLUGIN_OPTIONS_02->options();

$modal = (isset($mbPluginSSSoptions['modal']) && !empty($mbPluginSSSoptions['modal']) ? $mbPluginSSSoptions['modal'] : '');
if ($modal == 'on') {
    ?>
    <!--MODAL START-->
    <div class="melibu-social-modal">
        <!--MODAL DIALOG START-->
        <div class="melibu-social-modal__dialog">
            <!--MODAL HEADER START-->
            <div class="melibu-social-modal__header">
                <h3><?php
                    $modalTitle = (isset($mbPluginSSSoptions['modal-title']) && !empty($mbPluginSSSoptions['modal-title']) ? $mbPluginSSSoptions['modal-title'] : '');
                    if ($modalTitle) {
                        echo $modalTitle;
                    } else {
                        _e('Share', 'sharing-social-safe');
                    }
                    ?>
                </h3>
            </div>
            <!--MODAL HEADER END-->
            <!--MODAL BODY START-->
            <div class="melibu-social-modal__body">
                <?php echo $MELIBU_PLUGIN_SHARE->social($MELIBU_PLUGIN_SHARE->share_settings()); ?>
            </div>
            <!--MODAL BODY END-->
            <!--MODAL FOOTER START-->
            <div class="melibu-social-modal__footer">
                <a class="melibu-social-modal__footer__abort btn red"><?php _e('Cancel', 'sharing-social-safe'); ?></a>
            </div>
            <!--MODAL FOOTER END-->
        </div>
        <!--MODAL DIALOG END-->
    </div>
    <!--MODAL END-->
    <?php
}

$barPos = (isset($mbPluginSSSoptions['bar-pos']) && !empty($mbPluginSSSoptions['bar-pos']) ? $mbPluginSSSoptions['bar-pos'] : '');
if ($barPos != 'no' && count($MELIBU_PLUGIN_SHARE->user_follow()) > 0) {
    ?>
    <!--FEEDBACK START-->
    <div class="melibu-social--feedback <?php echo $barPos; ?>">
        <?php echo $MELIBU_PLUGIN_SHARE->social($MELIBU_PLUGIN_SHARE->user_follow()); ?>
        <div class="melibu-social--feedback-button">
            <i class="fa fa-share-alt" aria-hidden="true"></i>
        </div>
    </div>
    <!--FEEDBACK END-->
    <?php
}
