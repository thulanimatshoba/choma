<div id="search-modal" class="uk-modal-full uk-modal" uk-modal>
    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
        <button class="uk-modal-close-full" type="button" uk-close></button>
        <form class="uk-search uk-search-large uk-text-center">
            <input type="search" class="search-field uk-width" placeholder="<?php echo esc_attr_x('Search …', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
            <span class="uk-text-muted uk-text-small"><?php _e('Press Enter when you done...'); ?></span>
        </form>
    </div>
</div>