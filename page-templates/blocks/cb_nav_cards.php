<section class="nav_cards">
    <div class="container-xl">
        <div class="nav_cards__grid">
            <?php
        while(have_rows('cards')) {
            the_row();
            $l = get_sub_field('link');
            ?>
            <div class="nav_cards__card">
                <img class="nav_cards__image"
                    src="<?=wp_get_attachment_image_url(get_sub_field('image'), 'large')?>"
                    alt="">
                <div class="nav_cards__card-inner">
                    <h3 class="nav_cards__title">
                        <?=get_sub_field('title')?>
                    </h3>
                    <div>
                        <?=get_sub_field('content')?>
                    </div>
                    <a href="<?=$l['url']?>"
                        target="<?=$l['target']?>"
                        class="nav_cards__button"><?=html_entity_decode($l['title'])?></a>
                </div>
            </div>
            <?php
        }
            ?>
        </div>
    </div>
</section>