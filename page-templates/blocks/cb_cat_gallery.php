<?php
$classes = $block['className'] ?? 'pb-5';
$cat = get_field('project_category');

$q = new WP_Query(array(
    'post_type' => 'attachment',
    'post_status' => 'inherit', // Include attachments that are published
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'project',
            'field'    => 'term_id',
            'terms'    => $cat,
        ),
    ),
));

$r = random_str(8);

if (get_field('id') ?? null) {
    ?>
<a class="anchor" id="<?=get_field('id')?>"></a>
    <?php
}
?>
<section class="gallery <?=$classes?>">
    <div class="container-xl">
        <?php
        if (get_field('title') ?? null) {
            ?>
        <h2 class="h3"><?=get_field('title')?></h2>
            <?php
        }
        ?>        
        <div class="gallery__grid">
            <?php
        while ($q->have_posts()) {
            $q->the_post();
            ?>
            <a href="<?=wp_get_attachment_image_url(get_the_ID(), 'full')?>"
                class="glightbox" data-gallery="gallery<?=$r?>">
                <img src="<?=wp_get_attachment_image_url(get_the_ID(), 'medium')?>"
                    alt="image" class="gallery__image" />
            </a>
            <?php
        }
?>
        </div>
    </div>
</section>
<?php
/*
add_action('wp_footer', function () {
    ?>
<script type="text/javascript">
    const lightbox = GLightbox();
</script>
<?php
}, 9999);
*/
?>