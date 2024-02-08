<?php
$cols = get_field('num_cols') == '4' ? 'image_cols__grid--four' : 'image_cols__grid--three';
$classes = $block['className'] ?? 'py-5';

$cat = get_field('project_category');

$q = new WP_Query(array(
    'post_type' => 'attachment',
    'post_status' => 'inherit', // Include attachments that are published
    'posts_per_page' => get_field('num_cols'),
    'tax_query' => array(
        array(
            'taxonomy' => 'project',
            'field'    => 'term_id',
            'terms'    => $cat,
        ),
    ),
));

?>
<section class="image_cols <?=$classes?>">
    <div class="container-xl">
        <div class="image_cols__grid <?=$cols?>">
        <?php
        $r = random_str(4);
        while ($q->have_posts()) {
            $q->the_post();
            ?>
            <a href="<?=wp_get_attachment_image_url(get_the_ID(), 'full')?>"
                class="glightbox" data-gallery="gallery<?$r?>">
                <img src="<?=wp_get_attachment_image_url(get_the_ID(), 'medium')?>"
                    alt="image" class="d-block w-100" />
            </a>
            <?php
        }
        ?>
        </div>
    </div>
</section>