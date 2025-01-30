<?php
$classes = $block['className'] ?? '';
$per_page = get_field('per_page') ?? 3;
$images = get_field('gallery') ?? null;

$r = random_str(8);

if (!empty($images) && is_array($images)) {
    ?>
    <section class="carousel_gallery <?=$classes?>">
        <div class="container-xl">
            <div class="carousel_gallery__carousel">
                <?php foreach ($images as $image_id) {
                    ?>
                <a href="<?=wp_get_attachment_image_url($image_id, 'full')?>"
                    class="glightbox carousel_gallery__slide" data-gallery="gallery<?=$r?>">
                    <img src="<?=wp_get_attachment_image_url($image_id, 'medium')?>"
                        alt="image" class="carousel_gallery__image" />
                </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}
?>
<style>
.carousel_gallery__image {
    aspect-ratio: 1;
    width: 100%;
    max-width: 200px;
    object-fit: cover;
    display: block;
    margin-inline: auto;
}
</style>
<?php
add_action('wp_footer', function () use ($per_page) {
    ?>
    <script>
        (function($) {
            $('.carousel_gallery__carousel').slick({
                dots: false,
                infinite: true,
                speed: 600,
                slidesToShow: <?= $per_page ?>,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 4000,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: Math.max(<?= esc_js($per_page) ?> - 1, 1),
                            slidesToScroll: 1,
                            autoplay: true
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            autoplay: true
                        }
                    }
                ]
            });

        })(jQuery);
    </script>
    <?php
}, 9999);