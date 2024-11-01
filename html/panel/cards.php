<!--WIDGET START-->
<div class="mb-l-cards">
    <h2><?php _e('Share Cards', 'sharing-social-safe'); ?></h2>
    <p><?php _e('These meta tags will be integrated into the head area when they are activated, so please do not use other social networks otherwise they have several duplicate meta tags in the head', 'sharing-social-safe'); ?>.</p>
    <p><?php _e('All Meta tags are determined automatically except for those marked with required, these are required fields and are required to make this option functional', 'sharing-social-safe'); ?>.</p>
    <p><small>* <?php _e('Override this only if you want it to be the same for all pages and contributions of the title, description or even the picture.', 'sharing-social-safe'); ?>.</small></p>
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
    <h3>Twitter <?php _e('Card', 'sharing-social-safe'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4>Twitter</h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <label class="st-checkbox-switch">
                <input type="checkbox" 
                       name="mb-social-get-setting-group[twitter-card]" 
                       value="on" 
                       class="st-checkbox-switch-input" 
                       <?php checked((isset($mbPluginSSSoptions['twitter-card']) ? $mbPluginSSSoptions['twitter-card'] : ''), 'on'); ?>>
                <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Type', 'sharing-social-safe'); ?></h4>
            <p>twitter:card</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <select name="mb-social-get-setting-group[twitter-card-type]"  class="mb-l-form--select">
                <option value='summary' <?php selected((isset($mbPluginSSSoptions['twitter-card-type']) ? $mbPluginSSSoptions['twitter-card-type'] : ''), 'summary'); ?>><?php _e('Summary', 'sharing-social-safe'); ?></option>
                <option value='summary_large_image' <?php selected((isset($mbPluginSSSoptions['twitter-card-type']) ? $mbPluginSSSoptions['twitter-card-type'] : ''), 'summary_large_image'); ?>><?php _e('Summary Large Image', 'sharing-social-safe'); ?></option>
            </select>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Required', 'sharing-social-safe'); ?></b>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Site', 'sharing-social-safe'); ?></h4>
            <p>twitter:site</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[twitter-card-site]" value="<?php echo (isset($mbPluginSSSoptions['twitter-card-site']) ? $mbPluginSSSoptions['twitter-card-site'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><b>@username</b> <?php _e('for the website used in the card footer', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Required', 'sharing-social-safe'); ?></b>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Creator', 'sharing-social-safe'); ?></h4>
            <p>twitter:creator</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[twitter-card-creator]" value="<?php echo (isset($mbPluginSSSoptions['twitter-card-creator']) ? $mbPluginSSSoptions['twitter-card-creator'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><b>@username</b> <?php _e('for the content creator / author', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Required', 'sharing-social-safe'); ?></b>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Title', 'sharing-social-safe'); ?> *</h4>
            <p>twitter:title</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[twitter-card-title]" value="<?php (isset($mbPluginSSSoptions['twitter-card-title']) ? $mbPluginSSSoptions['twitter-card-title'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('A concise title for the related content', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Description', 'sharing-social-safe'); ?> *</h4>
            <p>twitter:description</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[twitter-card-description]" value="<?php (isset($mbPluginSSSoptions['twitter-card-description']) ? $mbPluginSSSoptions['twitter-card-description'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('A description that concisely summarizes the content', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Image', 'sharing-social-safe'); ?> *</h4>
            <p>twitter:image</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[twitter-card-image]" id="twitter-card-image" value="<?php echo (isset($mbPluginSSSoptions['twitter-card-image']) ? $mbPluginSSSoptions['twitter-card-image'] : ''); ?>" class="mb-l-form--input">
            <input type="button" name="twitter-card-image" value="<?php _e('Choose image', 'sharing-social-safe'); ?>" class="mb-sss-upload-button">
            <input type="button" name="twitter-card-image" value="<?php _e('Remove image', 'sharing-social-safe'); ?>" class="mb-sss-upload-remove">
            <img src="<?php echo (isset($mbPluginSSSoptions['twitter-card-image']) ? $mbPluginSSSoptions['twitter-card-image'] : ''); ?>" class="mb-l-form-image twitter-card-image" alt="">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('The URL of the image to display', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Image Alt', 'sharing-social-safe'); ?> *</h4>
            <p>twitter:image:alt</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[twitter-card-image-alt]" value="<?php (isset($mbPluginSSSoptions['twitter-card-image-alt']) ? $mbPluginSSSoptions['twitter-card-image-alt'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('A text description of the image', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>

    <h3>Facebook <?php _e('Card', 'sharing-social-safe'); ?></h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4>Facebook</h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <label class="st-checkbox-switch">
                <input type="checkbox" 
                       name="mb-social-get-setting-group[facebook-card]" 
                       value="on" 
                       class="st-checkbox-switch-input" 
                       <?php checked((isset($mbPluginSSSoptions['facebook-card']) && !empty($mbPluginSSSoptions['facebook-card']) ? $mbPluginSSSoptions['facebook-card'] : ''), 'on'); ?>>
                <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Type', 'sharing-social-safe'); ?></h4>
            <p>og:type</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <select name="mb-social-get-setting-group[facebook-card-type]"  class="mb-l-form--select">
                <option value='website' <?php selected((isset($mbPluginSSSoptions['facebook-card-type']) ? $mbPluginSSSoptions['facebook-card-type'] : ''), 'website'); ?>><?php _e('Website (default)', 'sharing-social-safe'); ?></option>
                <option value='blog' <?php selected((isset($mbPluginSSSoptions['facebook-card-type']) ? $mbPluginSSSoptions['facebook-card-type'] : ''), 'blog'); ?>><?php _e('Blog', 'sharing-social-safe'); ?></option>
                <option value='article' <?php selected((isset($mbPluginSSSoptions['facebook-card-type']) ? $mbPluginSSSoptions['facebook-card-type'] : ''), 'article'); ?>><?php _e('Article', 'sharing-social-safe'); ?></option>
                <option value='place' <?php selected((isset($mbPluginSSSoptions['facebook-card-type']) ? $mbPluginSSSoptions['facebook-card-type'] : ''), 'place'); ?>><?php _e('Place', 'sharing-social-safe'); ?></option>
                <option value='product' <?php selected((isset($mbPluginSSSoptions['facebook-card-type']) ? $mbPluginSSSoptions['facebook-card-type'] : ''), 'product'); ?>><?php _e('Product', 'sharing-social-safe'); ?></option>
                <option value='profile' <?php selected((isset($mbPluginSSSoptions['facebook-card-type']) ? $mbPluginSSSoptions['facebook-card-type'] : ''), 'profile'); ?>><?php _e('Profile', 'sharing-social-safe'); ?></option>
            </select>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('The media type of your content', 'sharing-social-safe'); ?>.</p>
            <p><?php _e('If you choose "article" or "blog" as type, pinterest is automatically supported', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Required', 'sharing-social-safe'); ?></b>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('URL', 'sharing-social-safe'); ?> *</h4>
            <p>og:url</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[facebook-card-url]" value="<?php echo (isset($mbPluginSSSoptions['facebook-card-url']) ? $mbPluginSSSoptions['facebook-card-url'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('The canonical URL for your page', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Title', 'sharing-social-safe'); ?> *</h4>
            <p>og:title</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[facebook-card-title]" value="<?php echo (isset($mbPluginSSSoptions['facebook-card-title']) ? $mbPluginSSSoptions['facebook-card-title'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('The title of your article without branding (eg the name of the site)', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Description', 'sharing-social-safe'); ?> *</h4>
            <p>og:description</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[facebook-card-description]" value="<?php echo (isset($mbPluginSSSoptions['facebook-card-description']) ? $mbPluginSSSoptions['facebook-card-description'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('A brief description of the content', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Image', 'sharing-social-safe'); ?> *</h4>
            <p>og:image</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[facebook-card-image]" id="facebook-card-image" value="<?php echo (isset($mbPluginSSSoptions['facebook-card-image']) ? $mbPluginSSSoptions['facebook-card-image'] : ''); ?>" class="mb-l-form--input">
            <input type="button" name="facebook-card-image" value="<?php _e('Choose image', 'sharing-social-safe'); ?>" class="mb-sss-upload-button">
            <input type="button" name="facebook-card-image" value="<?php _e('Remove image', 'sharing-social-safe'); ?>" class="mb-sss-upload-remove">
            <img src="<?php echo (isset($mbPluginSSSoptions['facebook-card-image']) ? $mbPluginSSSoptions['facebook-card-image'] : ''); ?>" class="mb-l-form-image facebook-card-image" alt="">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('The URL of the image to display', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('fb APP ID', 'sharing-social-safe'); ?></h4>
            <p>fb:app_id</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[facebook-card-fb]" value="<?php echo (isset($mbPluginSSSoptions['facebook-card-fb']) ? $mbPluginSSSoptions['facebook-card-fb'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('To use the domain statistics of Facebook', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
        </div>
    </div>    

    <h3>Pinterest (Rich Pin)</h3>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4>Pinterest</h4>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <label class="st-checkbox-switch">
                <input type="checkbox" 
                       name="mb-social-get-setting-group[pinterest-rich-pin]" 
                       value="on" 
                       class="st-checkbox-switch-input" 
                       <?php checked((isset($mbPluginSSSoptions['pinterest-rich-pin']) ? $mbPluginSSSoptions['pinterest-rich-pin'] : ''), 'on'); ?>>
                <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Type', 'sharing-social-safe'); ?></h4>
            <p>og:type</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <select name="mb-social-get-setting-group[pinterest-rich-pin-type]"  class="mb-l-form--select">
                <option value='blog' <?php selected((isset($mbPluginSSSoptions['facebook-card-type']) && !empty($mbPluginSSSoptions['facebook-card-type']) ? $mbPluginSSSoptions['facebook-card-type'] : ''), 'blog'); ?>><?php _e('Blog', 'sharing-social-safe'); ?></option>
                <option value='article' <?php selected((isset($mbPluginSSSoptions['facebook-card-type']) && !empty($mbPluginSSSoptions['facebook-card-type']) ? $mbPluginSSSoptions['facebook-card-type'] : ''), 'article'); ?>><?php _e('Article', 'sharing-social-safe'); ?></option>
            </select>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('The media type of your content', 'sharing-social-safe'); ?>.</p>
            <p><?php _e('If you choose "article" or "blog" as type, pinterest is automatically supported', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Required', 'sharing-social-safe'); ?></b>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Title', 'sharing-social-safe'); ?> *</h4>
            <p>og:title</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[pinterest-rich-pin-title]" value="<?php echo (isset($mbPluginSSSoptions['pinterest-rich-pin-title']) ? $mbPluginSSSoptions['pinterest-rich-pin-title'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('The title of your article without branding (eg the name of the site)', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Description', 'sharing-social-safe'); ?> *</h4>
            <p>og:description</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[pinterest-rich-pin-description]" value="<?php echo (isset($mbPluginSSSoptions['pinterest-rich-pin-description']) ? $mbPluginSSSoptions['pinterest-rich-pin-description'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('A brief description of the content', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Author', 'sharing-social-safe'); ?> *</h4>
            <p>article:author</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <input type="text" name="mb-social-get-setting-group[pinterest-rich-pin-author]" value="<?php echo (isset($mbPluginSSSoptions['pinterest-rich-pin-author']) ? $mbPluginSSSoptions['pinterest-rich-pin-author'] : ''); ?>" class="mb-l-form--input">
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('The article author. All formatting, line breaks and HTML tags will be removed', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4><?php _e('Publish at', 'sharing-social-safe'); ?></h4>
            <p>article:published_time</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <label class="st-checkbox-switch">
                <input type="checkbox" 
                       name="mb-social-get-setting-group[pinterest-rich-pin-publish]" 
                       value="on" 
                       class="st-checkbox-switch-input" 
                       <?php checked((isset($mbPluginSSSoptions['pinterest-rich-pin-publish']) && !empty($mbPluginSSSoptions['pinterest-rich-pin-publish']) ? $mbPluginSSSoptions['pinterest-rich-pin-publish'] : ''), 'on'); ?>>
                <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <?php _e('The date the article was first published', 'sharing-social-safe'); ?>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
            <small><?php _e('Default is determined dynamically', 'sharing-social-safe'); ?></small>
        </div>
    </div>
    <div class="mb-l-form st-clear-after">
        <div class="mb-l-form--head mb-st-grid-3">
            <h4>Rich Pin</h4>
            <p>pinterest-rich-pin</p>
        </div>
        <div class="mb-l-form--body mb-st-grid-3">
            <label class="st-checkbox-switch">
                <input type="checkbox" 
                       name="mb-social-get-setting-group[pinterest-rich-pin-opt]" 
                       value="on" 
                       class="st-checkbox-switch-input" 
                       <?php checked((isset($mbPluginSSSoptions['pinterest-rich-pin-opt']) && !empty($mbPluginSSSoptions['pinterest-rich-pin-opt']) ? $mbPluginSSSoptions['pinterest-rich-pin-opt'] : ''), 'on'); ?>>
                <span class="st-checkbox-switch-label" data-on="<?php _e('Enable', 'sharing-social-safe'); ?>" data-off="<?php _e('Disable', 'sharing-social-safe'); ?>"></span> 
                <span class="st-checkbox-switch-handle"></span> 
            </label>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <p><?php _e('If you do not want content from your site to be displayed as rich pins, just enable this option', 'sharing-social-safe'); ?>.</p>
        </div>
        <div class="mb-l-form--foot mb-st-grid-3">
            <b><?php _e('Not Required', 'sharing-social-safe'); ?></b>
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
    </div>

</div>
<!--WIDGET END-->