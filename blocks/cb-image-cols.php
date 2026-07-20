<?php
/**
 * CB Image Columns
 *
 * @package cb-kingswood2024
 */

defined( 'ABSPATH' ) || exit;

$cols    = '4' === get_field('num_cols') ? 'image_cols__grid--four' : 'image_cols__grid--three';
$classes = $block['className'] ?? 'py-5';

$pos = get_field('image_position') ?? 'image_cols--center';

if ( 'top' === $pos ) {
	$pos = 'image_cols--top';
}
if ( 'bottom' === $pos ) {
	$pos = 'image_cols--bottom';
}

?>
<section class="image_cols <?= esc_attr( $classes ); ?>">
	<div class="container-xl">
		<div class="image_cols__grid <?= esc_attr( $cols ); ?>">
			<?php
			$r = random_str(4);
			foreach ( get_field('images') as $i ) {
				$image_alt = get_post_meta($i, '_wp_attachment_image_alt', true) ?? null;
				?>
			<a href="<?= esc_url( wp_get_attachment_image_url( $i, 'full' ) ); ?>"
				class="glightbox" data-gallery="gallery<?= esc_attr( $r ); ?>">
				<img src="<?= esc_url( wp_get_attachment_image_url( $i, 'medium' ) ); ?>"
					alt="<?= esc_attr( $image_alt ); ?>"
					class="d-block w-100 <?= esc_attr( $pos ); ?>" />
			</a>
				<?php
			}
			?>
		</div>
	</div>
</section>