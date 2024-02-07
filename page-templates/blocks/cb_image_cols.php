<?php
$classes = $block['className'] ?? 'py-5';
?>
<section class="image_cols <?=$classes?>">
    <div class="container-xl">
        <div class="image_cols__grid">
        <?php
        $r = random_str(4);
        foreach (get_field('images') as $i) {
            ?>
            <a href="<?=wp_get_attachment_image_url($i, 'full')?>"
                class="glightbox" data-gallery="gallery<?$r?>">
                <img src="<?=wp_get_attachment_image_url($i, 'medium')?>"
                    alt="image" class="d-block w-100" />
            </a>
            <?php
        }
        ?>
        </div>
    </div>
</section>