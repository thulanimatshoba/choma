<div id="offcanvas-push" uk-offcanvas="mode: push; overlay: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <?php
            get_template_part('partials/header/branding');
            get_template_part('partials/menus/offcanvas', 'menu'); ?>

        <hr class="uk-divider-icon">

        <div class="login-buttons">
            <div class="uk-float-left">
                <?php _e('Follow Us On'); ?>
            </div>
            <div class="uk-float-right">
                <?php get_template_part('partials/menus/social', 'menu'); ?>
            </div>
        </div>
    </div>
</div>