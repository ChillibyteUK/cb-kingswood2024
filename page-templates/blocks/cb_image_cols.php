<?php
$cols = get_field('num_cols') == '4' ? 'image_cols__grid--four' : 'image_cols__grid--three';
$classes = $block['className'] ?? 'py-5';

$pos = get_field('image_position') ?? 'image_cols--center';

if ($pos == 'top') {
    $pos = 'image_cols--top';
}
if ($pos == 'bottom') {
    $pos = 'image_cols--bottom';
}


?>
<section class="image_cols <?=$classes?>">
    <div class="container-xl">
        <div class="image_cols__grid <?=$cols?>">
            <?php
        $r = random_str(4);
foreach (get_field('images') as $i) {
    $image_alt = get_post_meta($i, '_wp_attachment_image_alt', true) ?? null;
    ?>
            <a href="<?=wp_get_attachment_image_url($i, 'full')?>"
                class="glightbox" data-gallery="gallery<?$r?>">
                <img src="<?=wp_get_attachment_image_url($i, 'medium')?>"
                    alt="<?=$image_alt?>"
                    class="d-block w-100 <?=$pos?>" />
            </a>
            <?php
}
?>
        </div>
    </div>
</section>