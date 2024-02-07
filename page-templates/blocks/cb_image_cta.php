<?php
$img = wp_get_attachment_image_url(get_field('image'),'full');
?>
<section class="image_cta" style="background-image:url(<?=$img?>)">
    <div class="image_cta__inner">
        <?php
        if (get_field('pre_title') ?? null) {
            ?>
        <div class="h4 mb-0"><?=get_field('pre_title')?></div>
            <?php
        }
        ?>
        <h2 class="h1 mb-2"><?=get_field('title')?></h2>
        <?php
        if (get_field('content') ?? null) {
            ?>
        <div class="image_cta__content pb-4 h5">
            <?=get_field('content')?>
        </div>
            <?php
        }
        $l = get_field('link');
        ?>
        <a class="button" href="<?=$l['url']?>" target="<?=$l['target']?>"><?=html_entity_decode($l['title'])?></a>
    </div>
</section>