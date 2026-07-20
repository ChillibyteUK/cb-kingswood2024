<?php
/**
 * Carousel Gallery Block
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$classes = $block['className'] ?? '';
$ppage   = get_field('per_page') ?? 3;
$images  = get_field('gallery') ?? null;

$r = random_str(8);

if ( ! empty($images) && is_array($images) ) {
	?>
	<section class="carousel_gallery <?= esc_attr( $classes ); ?>">
		<div class="container-xl">
			<div class="carousel_gallery__carousel">
				<?php
				foreach ( $images as $image_id ) {
					?>
				<a href="<?= esc_url( wp_get_attachment_image_url( $image_id, 'full' ) ); ?>"
					class="glightbox carousel_gallery__slide" data-gallery="gallery<?= esc_attr( $r ); ?>">
					<img src="<?= esc_url( wp_get_attachment_image_url( $image_id, 'medium' ) ); ?>"
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
add_action('wp_footer', function () use ( $ppage ) {
	?>
	<script>
		(function($) {
			$('.carousel_gallery__carousel').slick({
				dots: false,
				infinite: true,
				speed: 600,
				slidesToShow: <?= esc_attr( $ppage ); ?>,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 4000,
				arrows: false,
				responsive: [
					{
						breakpoint: 992,
						settings: {
							slidesToShow: Math.max(<?= esc_js($ppage); ?> - 1, 1),
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