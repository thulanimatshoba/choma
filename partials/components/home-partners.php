<?php
$homepage_partners = carbon_get_the_post_meta('choma_partners');
$homepage_partners_title = carbon_get_the_post_meta('choma_partners_title');

?>

<div uk-grid uk-scrollspy="cls: uk-animation-slide-right-medium; target: .partners-blocks; delay: 300; repeat: false">
    <div class="partners-blocks uk-width-1-5@m uk-margin-auto uk-margin-auto-vertical">
        <span>
            <?= $homepage_partners_title ?>
        </span>
    </div>
    <div class="partners-blocks uk-width-expand@m">
        <div class="uk-position-relative uk-visible-toggle" uk-slider="autoplay: true">
            <?php
            echo '<div class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m">';
            if ($homepage_partners) {
                foreach ($homepage_partners as $partner) : ?>
                    <div class="partners-list">
                        <div class="partners-deck">
                            <a href="<?= $partner['partner_link'] ?>" target="_blank">
                                <figure class="clients-thumbnail uk-text-center" title="<?= $partner['partner_name'] ?>">
                                    <?= wp_get_attachment_image($partner['partner_logo'], 100); ?>
                                </figure>
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            } ?>
        </div>
    </div>
</div>
</div>