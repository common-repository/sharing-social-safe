<!--CUSSTOM CSS START-->
<?php
$sample = '';
$breaks = array("<br />", "<br>", "<br/>");
$sample = str_ireplace($breaks, "\r\n", $sample);
?>
<div class="mb-l-customcss">
    <h2><?php _e('Custom CSS', 'sharing-social-safe'); ?></h2>
    <p><?php _e('Use your own CSS to override the current design', 'sharing-social-safe'); ?>.</p>
    <h3><?php _e('Customize it', 'sharing-social-safe'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <button type="submit" class="button-primary"><?php _e('Save', 'sharing-social-safe'); ?></button>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>  
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Custom CSS', 'sharing-social-safe'); ?></h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-9">
            <textarea name="mb-social-get-setting-group[custom-css]" placeholder="<?php echo $sample; ?>" class="mb-l-form--textarea"><?php echo (isset($mbPluginSSSoptions['custom-css']) ? str_ireplace(array('\r\n', '\r', '\n'), "\n", $mbPluginSSSoptions['custom-css']) : ''); ?></textarea>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <button type="submit" class="button-primary"><?php _e('Save', 'sharing-social-safe'); ?></button>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>  
    <?php wp_nonce_field('mb-social-nonce-action', 'mb-social-nonce'); ?>
</form>
</div>
<!--CUSSTOM CSS END-->